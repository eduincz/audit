<?php
/**
*
* @package phpBB3
* @version $Id$
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
include($phpbb_root_path . 'includes/bbcode.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('viewforum');

display_forums('', $config['load_moderators']);

//ini_set('display_errors', 1);

// Set some stats, get posts count from forums data if we... hum... retrieve all forums data
$total_posts	= $config['num_posts'];
$total_topics	= $config['num_topics'];
$total_users	= $config['num_users'];

$l_total_user_s = ($total_users == 0) ? 'TOTAL_USERS_ZERO' : 'TOTAL_USERS_OTHER';
$l_total_post_s = ($total_posts == 0) ? 'TOTAL_POSTS_ZERO' : 'TOTAL_POSTS_OTHER';
$l_total_topic_s = ($total_topics == 0) ? 'TOTAL_TOPICS_ZERO' : 'TOTAL_TOPICS_OTHER';

// Grab group details for legend display
if ($auth->acl_gets('a_group', 'a_groupadd', 'a_groupdel'))
{
	$sql = 'SELECT group_id, group_name, group_colour, group_type
		FROM ' . GROUPS_TABLE . '
		WHERE group_legend = 1
		ORDER BY group_name ASC';
}
else
{
	$sql = 'SELECT g.group_id, g.group_name, g.group_colour, g.group_type
		FROM ' . GROUPS_TABLE . ' g
		LEFT JOIN ' . USER_GROUP_TABLE . ' ug
			ON (
				g.group_id = ug.group_id
				AND ug.user_id = ' . $user->data['user_id'] . '
				AND ug.user_pending = 0
			)
		WHERE g.group_legend = 1
			AND (g.group_type <> ' . GROUP_HIDDEN . ' OR ug.user_id = ' . $user->data['user_id'] . ')
		ORDER BY g.group_name ASC';
}
$result = $db->sql_query($sql);

$legend = array();
while ($row = $db->sql_fetchrow($result))
{
	$colour_text = ($row['group_colour']) ? ' style="color:#' . $row['group_colour'] . '"' : '';
	$group_name = ($row['group_type'] == GROUP_SPECIAL) ? $user->lang['G_' . $row['group_name']] : $row['group_name'];

	if ($row['group_name'] == 'BOTS' || ($user->data['user_id'] != ANONYMOUS && !$auth->acl_get('u_viewprofile')))
	{
		$legend[] = '<span' . $colour_text . '>' . $group_name . '</span>';
	}
	else
	{
		$legend[] = '<a' . $colour_text . ' href="' . append_sid("{$phpbb_root_path}memberlist.$phpEx", 'mode=group&amp;g=' . $row['group_id']) . '">' . $group_name . '</a>';
	}
}
$db->sql_freeresult($result);

$legend = implode(', ', $legend);

// aktuality
$sql = '
  SELECT
    p.post_text,
    p.bbcode_bitfield,
    p.bbcode_uid,
    t.topic_id,
    t.topic_title,
    t.topic_first_poster_name,
    t.topic_time,
    t.topic_poster,
		f.forum_id,
		f.forum_name,
		f.forum_parents,
		u.user_colour,
		IF(t.topic_poster = 1, t.topic_first_poster_name, u.username) as username
  FROM
    ' . TOPICS_TABLE . ' t
	JOIN
		' . POSTS_TABLE . ' p ON t.topic_id = p.topic_id
	JOIN
		' . USERS_TABLE . ' u ON t.topic_poster = u.user_id
  JOIN
    ' . FORUMS_TABLE . ' f ON f.forum_id = t.forum_id
  WHERE 
		f.forum_id IN (SELECT ag.forum_id FROM ' . ACL_GROUPS_TABLE . ' ag LEFT JOIN ' . ACL_ROLES_DATA_TABLE . ' ar ON ar.role_id = ag.auth_role_id WHERE ag.group_id IN (1, 2, 3, 6) AND ((ag.auth_setting = 1 AND ag.auth_option_id IN (14, 20)) OR (ar.auth_setting = 1 AND ar.auth_option_id IN (14, 20))))
		AND t.topic_approved = 1
	  AND f.forum_id = 9
  ORDER BY
    topic_time DESC
  LIMIT 3
';

$result = $db->sql_query($sql);
$forum_url = '';
$forum_name = '';
while ($row = $db->sql_fetchrow($result)) {
	$row['TOPIC_URL'] = append_sid("{$phpbb_root_path}viewtopic.$phpEx", "f=" . $row['forum_id'] . "&amp;t=" . $row['topic_id']);
	$row['FORUM_URL'] = append_sid("{$phpbb_root_path}viewforum.$phpEx", "f=" . $row['forum_id']);
	$row['TOPIC_TITLE'] = censor_text($row['topic_title']);
	$row['FORUM_NAME'] = censor_text($row['forum_name']);

  $message = censor_text($row['post_text']);
	$bbcode_bitfield = $row['bbcode_bitfield'];
  if ($bbcode_bitfield !== '')
  {
  	$bbcode = new bbcode(base64_encode($bbcode_bitfield));
  }
	
  if ($row['bbcode_bitfield'])
	{
		$bbcode->bbcode_second_pass($message, $row['bbcode_uid'], $row['bbcode_bitfield']);
	}
  
  $row['CONTENT'] = $message;
  $row['AUTHOR'] = get_username_string('full', $row['topic_poster'], $row['username'], $row['user_colour']);
  
	$row['TOPIC_TIME'] = date( "j.n.Y H:i" ,$row['topic_time']);  

  $forum_url = $row['FORUM_URL'];
  $forum_name = $row['FORUM_NAME'];
    //var_dump($row);
	
	$template->assign_block_vars('aktuality', $row);
}
 
$template->assign_vars(array( 'AKTUALITY_FORUM_URL'	=> $forum_url ) );
$template->assign_vars(array( 'AKTUALITY_FORUM_NAME'	=> $forum_name ) );

// Nejnov??j???? p????sp??vky
$sql = '
	SELECT
		p.post_id,
		p.post_subject,
		p.post_time,
		p.poster_id,
		p.post_subject,
		t.topic_id,
		t.topic_title,
		f.forum_id,
		f.forum_name,
		f.forum_parents,
		u.user_colour,
		IF(p.poster_id = 1, p.post_username, u.username) as username
	FROM
		' . POSTS_TABLE . ' p
	JOIN
		' . TOPICS_TABLE . ' t ON t.topic_id = p.topic_id
	JOIN
		' . USERS_TABLE . ' u ON p.poster_id = u.user_id
	JOIN
		' . FORUMS_TABLE . ' f ON f.forum_id = t.forum_id
	WHERE
		f.forum_id IN (SELECT ag.forum_id FROM ' . ACL_GROUPS_TABLE . ' ag LEFT JOIN ' . ACL_ROLES_DATA_TABLE . ' ar ON ar.role_id = ag.auth_role_id WHERE ag.group_id IN (1, 2, 3, 6) AND ((ag.auth_setting = 1 AND ag.auth_option_id IN (14, 20)) OR (ar.auth_setting = 1 AND ar.auth_option_id IN (14, 20))))
		AND p.post_approved = 1
		AND f.forum_id != 153 AND f.forum_id != 9
	ORDER BY
		post_time DESC
	LIMIT
		5
	';
$result = $db->sql_query($sql);
while ($row = $db->sql_fetchrow($result)) {
	$row['TOPIC_URL'] = append_sid("{$phpbb_root_path}viewtopic.$phpEx", "f=" . $row['forum_id'] . "&amp;t=" . $row['topic_id']);
	$row['POST_URL'] = append_sid("{$phpbb_root_path}viewtopic.$phpEx", "f=" . $row['forum_id'] . "&amp;t=" . $row['topic_id'] . "&amp;p=" . $row['post_id'] . "#p" . $row['post_id']);
	$row['FORUM_URL'] = append_sid("{$phpbb_root_path}viewforum.$phpEx", "f=" . $row['forum_id']);
	$row['AUTHOR'] = get_username_string('full', $row['poster_id'], $row['username'], $row['user_colour']);
	$row['POST_SUBJECT'] = censor_text($row['post_subject']);
	$row['TOPIC_TITLE'] = censor_text($row['topic_title']);
	$row['FORUM_NAME'] = censor_text($row['forum_name']);

	//$row['POST_TIME'] = $user->format_date($row['post_time']);
	$row['POST_TIME'] = date( "j.n.Y H:i" ,$row['post_time']);  
	
	$template->assign_block_vars('lastposts', $row);
}


// Generate birthday list if required ...
$birthday_list = '';
if ($config['load_birthdays'] && $config['allow_birthdays'])
{
	$now = getdate(time() + $user->timezone + $user->dst - date('Z'));
	$sql = 'SELECT u.user_id, u.username, u.user_colour, u.user_birthday
		FROM ' . USERS_TABLE . ' u
		LEFT JOIN ' . BANLIST_TABLE . " b ON (u.user_id = b.ban_userid)
		WHERE (b.ban_id IS NULL
			OR b.ban_exclude = 1)
			AND u.user_birthday LIKE '" . $db->sql_escape(sprintf('%2d-%2d-', $now['mday'], $now['mon'])) . "%'
			AND u.user_type IN (" . USER_NORMAL . ', ' . USER_FOUNDER . ')';
	$result = $db->sql_query($sql);

	while ($row = $db->sql_fetchrow($result))
	{
		$birthday_list .= (($birthday_list != '') ? ', ' : '') . get_username_string('full', $row['user_id'], $row['username'], $row['user_colour']);

		if ($age = (int) substr($row['user_birthday'], -4))
		{
			$birthday_list .= ' (' . ($now['year'] - $age) . ')';
		}
	}
	$db->sql_freeresult($result);
}

// Assign index specific vars
$template->assign_vars(array(
	'TOTAL_POSTS'	=> sprintf($user->lang[$l_total_post_s], $total_posts),
	'TOTAL_TOPICS'	=> sprintf($user->lang[$l_total_topic_s], $total_topics),
	'TOTAL_USERS'	=> sprintf($user->lang[$l_total_user_s], $total_users),
	'NEWEST_USER'	=> sprintf($user->lang['NEWEST_USER'], get_username_string('full', $config['newest_user_id'], $config['newest_username'], $config['newest_user_colour'])),

	'LEGEND'		=> $legend,
	'BIRTHDAY_LIST'	=> $birthday_list,

	'FORUM_IMG'				=> $user->img('forum_read', 'NO_UNREAD_POSTS'),
	'FORUM_UNREAD_IMG'			=> $user->img('forum_unread', 'UNREAD_POSTS'),
	'FORUM_LOCKED_IMG'		=> $user->img('forum_read_locked', 'NO_UNREAD_POSTS_LOCKED'),
	'FORUM_UNREAD_LOCKED_IMG'	=> $user->img('forum_unread_locked', 'UNREAD_POSTS_LOCKED'),

	'S_LOGIN_ACTION'			=> append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=login'),
	'S_DISPLAY_BIRTHDAY_LIST'	=> ($config['load_birthdays']) ? true : false,

	'U_MARK_FORUMS'		=> ($user->data['is_registered'] || $config['load_anon_lastread']) ? append_sid("{$phpbb_root_path}index.$phpEx", 'hash=' . generate_link_hash('global') . '&amp;mark=forums') : '',
	'U_MCP'				=> ($auth->acl_get('m_') || $auth->acl_getf_global('m_')) ? append_sid("{$phpbb_root_path}mcp.$phpEx", 'i=main&amp;mode=front', true, $user->session_id) : '')
);

// Output page
page_header($user->lang['INDEX']);

$template->set_filenames(array(
	'body' => 'index_body.html')
);

page_footer();

?>