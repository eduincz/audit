<?php
/**
 * Open Graph Tags
 *
 * Add Open Graph tags so that Facebook (and any other service that supports them)
 * can crawl the site better and we provide a better sharing experience.
 *
 * @link https://ogp.me/
 * @link https://developers.facebook.com/docs/opengraph/
 *
 * @package Jetpack
 */

add_action( 'wp_head', 'jetpack_og_tags' );
add_action( 'amp_story_head', 'jetpack_og_tags' );

/**
 * Outputs Open Graph tags generated by Jetpack.
 */
function jetpack_og_tags() {
	global $post;
	$data = $post; // so that we don't accidentally explode the global.
	/**
	 * Allow Jetpack to output Open Graph Meta Tags.
	 *
	 * @module sharedaddy, publicize
	 *
	 * @since 2.0.0
	 * @deprecated 2.0.3 Duplicative filter. Use `jetpack_enable_open_graph`.
	 *
	 * @param bool true Should Jetpack's Open Graph Meta Tags be enabled. Default to true.
	 */
	if ( false === apply_filters( 'jetpack_enable_opengraph', true ) ) {
		_deprecated_function( 'jetpack_enable_opengraph', '2.0.3', 'jetpack_enable_open_graph' );
		return;
	}

	$is_amp_response = ( class_exists( 'Jetpack_AMP_Support' ) && Jetpack_AMP_Support::is_amp_request() );

	// Disable the widont filter on WP.com to avoid stray &nbsps.
	$disable_widont = remove_filter( 'the_title', 'widont' );

	$og_output = "\n";
	if ( ! $is_amp_response ) { // Because AMP optimizes the order or the nodes in the head.
		$og_output .= "<!-- Jetpack Open Graph Tags -->\n";
	}
	$tags = array();

	/**
	 * Filter the minimum width of the images used in Jetpack Open Graph Meta Tags.
	 *
	 * @module sharedaddy, publicize
	 *
	 * @since 2.0.0
	 *
	 * @param int 200 Minimum image width used in Jetpack Open Graph Meta Tags.
	 */
	$image_width = absint( apply_filters( 'jetpack_open_graph_image_width', 200 ) );
	/**
	 * Filter the minimum height of the images used in Jetpack Open Graph Meta Tags.
	 *
	 * @module sharedaddy, publicize
	 *
	 * @since 2.0.0
	 *
	 * @param int 200 Minimum image height used in Jetpack Open Graph Meta Tags.
	 */
	$image_height       = absint( apply_filters( 'jetpack_open_graph_image_height', 200 ) );
	$description_length = 197;

	if ( is_home() || is_front_page() ) {
		$site_type              = Jetpack_Options::get_option_and_ensure_autoload( 'open_graph_protocol_site_type', '' );
		$tags['og:type']        = ! empty( $site_type ) ? $site_type : 'website';
		$tags['og:title']       = get_bloginfo( 'name' );
		$tags['og:description'] = get_bloginfo( 'description' );

		$front_page_id = get_option( 'page_for_posts' );
		if ( 'page' === get_option( 'show_on_front' ) && $front_page_id && is_home() ) {
			$tags['og:url'] = get_permalink( $front_page_id );
		} else {
			$tags['og:url'] = home_url( '/' );
		}

		// Associate a blog's root path with one or more Facebook accounts.
		$facebook_admins = Jetpack_Options::get_option_and_ensure_autoload( 'facebook_admins', array() );
		if ( ! empty( $facebook_admins ) ) {
			$tags['fb:admins'] = $facebook_admins;
		}
	} elseif ( is_author() ) {
		$tags['og:type'] = 'profile';

		$author = get_queried_object();

		if ( is_a( $author, 'WP_User' ) ) {
			$tags['og:title'] = $author->display_name;
			if ( ! empty( $author->user_url ) ) {
				$tags['og:url'] = $author->user_url;
			} else {
				$tags['og:url'] = get_author_posts_url( $author->ID );
			}
			$tags['og:description']     = $author->description;
			$tags['profile:first_name'] = get_the_author_meta( 'first_name', $author->ID );
			$tags['profile:last_name']  = get_the_author_meta( 'last_name', $author->ID );
		}
	} elseif ( is_archive() ) {
		$tags['og:type']  = 'website';
		$tags['og:title'] = wp_get_document_title();

		$archive = get_queried_object();
		if ( ! empty( $archive ) ) {
			if ( is_category() || is_tag() || is_tax() ) {
				$tags['og:url']         = get_term_link( $archive->term_id, $archive->taxonomy );
				$tags['og:description'] = $archive->description;
			} elseif ( is_post_type_archive() ) {
				$tags['og:url']         = get_post_type_archive_link( $archive->name );
				$tags['og:description'] = $archive->description;
			}
		}
	} elseif ( is_singular() && is_a( $data, 'WP_Post' ) ) {
		$tags['og:type'] = 'article';
		if ( empty( $data->post_title ) ) {
			$tags['og:title'] = ' ';
		} else {
			/** This filter is documented in core/src/wp-includes/post-template.php */
			$tags['og:title'] = wp_kses( apply_filters( 'the_title', $data->post_title, $data->ID ), array() );
		}

		$tags['og:url'] = get_permalink( $data->ID );
		if ( ! post_password_required() ) {
			/*
			 * If the post author set an excerpt, use that.
			 * Otherwise, pick the post content that comes before the More tag if there is one.
			 */
			$excerpt = ! empty( $data->post_excerpt )
				? $data->post_excerpt
				: explode( '<!--more-->', $data->post_content )[0];

			$tags['og:description'] = jetpack_og_get_description( $excerpt );
		}

		$tags['article:published_time'] = gmdate( 'c', strtotime( $data->post_date_gmt ) );
		$tags['article:modified_time']  = gmdate( 'c', strtotime( $data->post_modified_gmt ) );
		if ( post_type_supports( get_post_type( $data ), 'author' ) && isset( $data->post_author ) ) {
			$publicize_facebook_user = get_post_meta( $data->ID, '_publicize_facebook_user', true );
			if ( ! empty( $publicize_facebook_user ) ) {
				$tags['article:author'] = esc_url( $publicize_facebook_user );
			}
		}
	} elseif ( is_search() ) {
		if ( '' !== get_query_var( 's', '' ) ) {
			$tags['og:title'] = wp_get_document_title();
		}
	}
	/**
	 * Allow plugins to inject additional template-specific Open Graph tags.
	 *
	 * @module sharedaddy, publicize
	 *
	 * @since 3.0.0
	 *
	 * @param array $tags Array of Open Graph Meta tags.
	 * @param array $args Array of image size parameters.
	 */
	$tags = apply_filters( 'jetpack_open_graph_base_tags', $tags, compact( 'image_width', 'image_height' ) );

	// Re-enable widont if we had disabled it.
	if ( $disable_widont ) {
		add_filter( 'the_title', 'widont' );
	}

	/**
	 * Do not return any Open Graph Meta tags if we don't have any info about a post.
	 *
	 * @module sharedaddy, publicize
	 *
	 * @since 3.0.0
	 *
	 * @param bool true Do not return any Open Graph Meta tags if we don't have any info about a post.
	 */
	if ( empty( $tags ) && apply_filters( 'jetpack_open_graph_return_if_empty', true ) ) {
		return;
	}

	$tags['og:site_name'] = get_bloginfo( 'name' );

	// Get image info and build tags.
	if ( ! post_password_required() ) {
		$image_info       = jetpack_og_get_image( $image_width, $image_height );
		$tags['og:image'] = $image_info['src'];

		if ( ! empty( $image_info['width'] ) ) {
			$tags['og:image:width'] = (int) $image_info['width'];
		}
		if ( ! empty( $image_info['height'] ) ) {
			$tags['og:image:height'] = (int) $image_info['height'];
		}
		if ( ! empty( $image_info['alt_text'] ) ) {
			$tags['og:image:alt'] = esc_attr( $image_info['alt_text'] );
		}
	}

	// Facebook whines if you give it an empty title.
	if ( empty( $tags['og:title'] ) ) {
		$tags['og:title'] = __( '(no title)', 'jetpack' );
	}

	// Shorten the description if it's too long.
	if ( isset( $tags['og:description'] ) ) {
		$tags['og:description'] = strlen( $tags['og:description'] ) > $description_length ? mb_substr( $tags['og:description'], 0, $description_length ) . '…' : $tags['og:description'];
	}

	// Try to add OG locale tag if the WP->FB data mapping exists.
	if ( defined( 'JETPACK__GLOTPRESS_LOCALES_PATH' ) && file_exists( JETPACK__GLOTPRESS_LOCALES_PATH ) ) {
		require_once JETPACK__GLOTPRESS_LOCALES_PATH;
		$_locale = get_locale();

		// We have to account for w.org vs WP.com locale divergence.
		if ( defined( 'IS_WPCOM' ) && IS_WPCOM ) {
			$gp_locale = GP_Locales::by_field( 'slug', $_locale );
		} else {
			$gp_locale = GP_Locales::by_field( 'wp_locale', $_locale );
		}
	}

	if ( isset( $gp_locale->facebook_locale ) && ! empty( $gp_locale->facebook_locale ) ) {
		$tags['og:locale'] = $gp_locale->facebook_locale;
	}

	/**
	 * Allow the addition of additional Open Graph Meta tags, or modify the existing tags.
	 *
	 * @module sharedaddy, publicize
	 *
	 * @since 2.0.0
	 *
	 * @param array $tags Array of Open Graph Meta tags.
	 * @param array $args Array of image size parameters.
	 */
	$tags = apply_filters( 'jetpack_open_graph_tags', $tags, compact( 'image_width', 'image_height' ) );

	// secure_urls need to go right after each og:image to work properly so we will abstract them here.
	$tags['og:image:secure_url'] = ( empty( $tags['og:image:secure_url'] ) ) ? '' : $tags['og:image:secure_url'];
	$secure                      = $tags['og:image:secure_url'];
	unset( $tags['og:image:secure_url'] );
	$secure_image_num = 0;

	foreach ( (array) $tags as $tag_property => $tag_content ) {
		// to accommodate multiple images.
		$tag_content = (array) $tag_content;
		$tag_content = array_unique( $tag_content );

		foreach ( $tag_content as $tag_content_single ) {
			if ( empty( $tag_content_single ) ) {
				continue; // Don't ever output empty tags.
			}
			$og_tag = sprintf( '<meta property="%s" content="%s" />', esc_attr( $tag_property ), esc_attr( $tag_content_single ) );
			/**
			 * Filter the HTML Output of each Open Graph Meta tag.
			 *
			 * @module sharedaddy, publicize
			 *
			 * @since 2.0.0
			 *
			 * @param string $og_tag HTML HTML Output of each Open Graph Meta tag.
			 */
			$og_output .= apply_filters( 'jetpack_open_graph_output', $og_tag );
			$og_output .= "\n";

			if ( 'og:image' === $tag_property ) {
				if ( is_array( $secure ) && ! empty( $secure[ $secure_image_num ] ) ) {
					$og_tag = sprintf( '<meta property="og:image:secure_url" content="%s" />', esc_url( $secure[ $secure_image_num ] ) );
					/** This filter is documented in functions.opengraph.php */
					$og_output .= apply_filters( 'jetpack_open_graph_output', $og_tag );
					$og_output .= "\n";
				} elseif ( ! is_array( $secure ) && ! empty( $secure ) ) {
					$og_tag = sprintf( '<meta property="og:image:secure_url" content="%s" />', esc_url( $secure ) );
					/** This filter is documented in functions.opengraph.php */
					$og_output .= apply_filters( 'jetpack_open_graph_output', $og_tag );
					$og_output .= "\n";
				}
				$secure_image_num++;
			}
		}
	}

	if ( ! $is_amp_response ) { // Because AMP optimizes the order or the nodes in the head.
		$og_output .= "\n<!-- End Jetpack Open Graph Tags -->";
	}
	$og_output .= "\n";
	// This is trusted output or added by a filter.
	echo $og_output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Returns an image used in social shares.
 *
 * @since 2.0.0
 *
 * @param int  $width Minimum width for the image. Default is 200 based on Facebook's requirement.
 * @param int  $height Minimum height for the image. Default is 200 based on Facebook's requirement.
 * @param null $deprecated Deprecated.
 *
 * @return array The source ('src'), 'width', and 'height' of the image.
 */
function jetpack_og_get_image( $width = 200, $height = 200, $deprecated = null ) {
	if ( ! empty( $deprecated ) ) {
		_deprecated_argument( __FUNCTION__, '6.6.0' );
	}
	$image = array();

	if ( is_singular() && ! is_home() ) {
		// Grab obvious image if post is an attachment page for an image.
		if ( is_attachment( get_the_ID() ) && 'image' === substr( get_post_mime_type(), 0, 5 ) ) {
			$image['src'] = wp_get_attachment_url( get_the_ID() );
		}

		// Attempt to find something good for this post using our generalized PostImages code.
		if ( empty( $image ) && class_exists( 'Jetpack_PostImages' ) ) {
			$post_images = Jetpack_PostImages::get_images(
				get_the_ID(),
				array(
					'width'  => $width,
					'height' => $height,
				)
			);
			if ( $post_images && ! is_wp_error( $post_images ) ) {
				foreach ( (array) $post_images as $post_image ) {
					$image['src'] = $post_image['src'];
					if ( isset( $post_image['src_width'], $post_image['src_height'] ) ) {
						$image['width']  = $post_image['src_width'];
						$image['height'] = $post_image['src_height'];
					}
					if ( ! empty( $post_image['alt_text'] ) ) {
						$image['alt_text'] = $post_image['alt_text'];
					}
				}
			}
		}
	} elseif ( is_author() ) {
		$author = get_queried_object();
		if ( is_a( $author, 'WP_User' ) ) {
			$image['src'] = get_avatar_url(
				$author->user_email,
				array(
					'size' => $width,
				)
			);
		}
	}

	// First fall back, blavatar.
	if ( empty( $image ) && function_exists( 'blavatar_domain' ) ) {
		$blavatar_domain = blavatar_domain( site_url() );
		if ( blavatar_exists( $blavatar_domain ) ) {
			$image['src']    = blavatar_url( $blavatar_domain, 'img', $width, false, true );
			$image['width']  = $width;
			$image['height'] = $height;
		}
	}

	// Second fall back, Site Logo.
	if ( empty( $image ) && ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) ) {
		$image_id = jetpack_get_site_logo( 'id' );
		$logo     = wp_get_attachment_image_src( $image_id, 'full' );
		if (
			isset( $logo[0], $logo[1], $logo[2] )
			&& ( _jetpack_og_get_image_validate_size( $logo[1], $logo[2], $width, $height ) )
		) {
			$image['src']    = $logo[0];
			$image['width']  = $logo[1];
			$image['height'] = $logo[2];
		}
	}

	// Third fall back, Core Site Icon, if valid in size.
	if ( empty( $image ) && has_site_icon() ) {
		$image_id = get_option( 'site_icon' );
		$icon     = wp_get_attachment_image_src( $image_id, 'full' );
		if (
			isset( $icon[0], $icon[1], $icon[2] )
			&& ( _jetpack_og_get_image_validate_size( $icon[1], $icon[2], $width, $height ) )
		) {
			$image['src']    = $icon[0];
			$image['width']  = $icon[1];
			$image['height'] = $icon[2];
		}
	}

	// Final fall back, blank image.
	if ( empty( $image ) ) {
		/**
		 * Filter the default Open Graph Image tag, used when no Image can be found in a post.
		 *
		 * @since 3.0.0
		 *
		 * @param string $str Default Image URL.
		 */
		$image['src'] = apply_filters( 'jetpack_open_graph_image_default', 'https://s0.wp.com/i/blank.jpg' );
	}

	return $image;
}


/**
 * Validate the width and height against required width and height
 *
 * @param int $width      Width of the image.
 * @param int $height     Height of the image.
 * @param int $req_width  Required width to pass validation.
 * @param int $req_height Required height to pass validation.
 *
 * @return bool - True if the image passed the required size validation
 */
function _jetpack_og_get_image_validate_size( $width, $height, $req_width, $req_height ) {
	if ( ! $width || ! $height ) {
		return false;
	}

	$valid_width         = ( $width >= $req_width );
	$valid_height        = ( $height >= $req_height );
	$is_image_acceptable = $valid_width && $valid_height;

	return $is_image_acceptable;
}

/**
 * Gets a gravatar URL of the specified size.
 *
 * @param string $email E-mail address to get gravatar for.
 * @param int    $width Size of returned gravatar.
 * @return array|bool|mixed|string
 */
function jetpack_og_get_image_gravatar( $email, $width ) {
	return get_avatar_url(
		$email,
		array(
			'size' => $width,
		)
	);
}

/**
 * Clean up text meant to be used as Description Open Graph tag.
 *
 * There should be:
 * - no links
 * - no shortcodes
 * - no html tags or their contents
 * - not too many words.
 *
 * @param string       $description Text coming from WordPress (autogenerated or manually generated by author).
 * @param WP_Post|null $data        Information about our post.
 *
 * @return string $description Cleaned up description string.
 */
function jetpack_og_get_description( $description = '', $data = null ) {
	// Remove tags such as <style or <script.
	$description = wp_strip_all_tags( $description );

	/*
	 * Clean up any plain text entities left into formatted entities.
	 * Intentionally not using a filter to prevent pollution.
	 * @see https://github.com/Automattic/jetpack/pull/2899#issuecomment-151957382
	 */
	$description = wp_kses(
		trim(
			convert_chars(
				wptexturize( $description )
			)
		),
		array()
	);

	// Remove shortcodes.
	$description = strip_shortcodes( $description );

	// Remove links.
	$description = preg_replace(
		'@https?://[\S]+@',
		'',
		$description
	);

	/*
	 * Limit things to a small text blurb.
	 * There isn't a hard limit set by Facebook, so let's rely on WP's own limit.
	 * (55 words or the localized equivalent).
	 * This limit can be customized with the wp_trim_words filter.
	 */
	$description = wp_trim_words( $description );

	// Let's set a default if we have no text by now.
	if ( empty( $description ) ) {
		/**
		 * Filter the fallback `og:description` used when no excerpt information is provided.
		 *
		 * @module sharedaddy, publicize
		 *
		 * @since 3.9.0
		 *
		 * @param string $var  Fallback og:description. Default is translated `Visit the post for more'.
		 * @param object $data Post object for the current post.
		 */
		$description = apply_filters(
			'jetpack_open_graph_fallback_description',
			__( 'Visit the post for more.', 'jetpack' ),
			$data
		);
	}

	return $description;
}
