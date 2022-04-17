<?php

ini_set( 'DISPLAY_ERRORS', 1 );

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

// Output page
page_header($user->lang['INDEX']);

$template->set_filenames(array(
	'body' => 'overall_box.html')
);

page_footer();

//die('test') ;

?>