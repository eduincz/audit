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

// Nejnovější příspěvky
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


// Output page
page_header($user->lang['INDEX']);

$template->set_filenames(array(
	'body' => 'overall_box_post.html')
);

page_footer();

//die('test') ;

?>