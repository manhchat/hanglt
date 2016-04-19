<?php
$folder = "public";
define ( "IS_DEBUG", FALSE );
define ( "DS", DIRECTORY_SEPARATOR );
define ( "IMAGE_DIRECTORY_CATEGORY", realpath ( APPLICATION_PATH . "/../{$folder}/images/category/" ) );
define ( "IMAGE_DIRECTORY_CATEGORY_PREVIEW", realpath ( APPLICATION_PATH . "/../{$folder}/images/category/preview/" ) );
define ( "IMAGE_DIRECTORY_PRODUCT", realpath ( APPLICATION_PATH . "/../{$folder}/images/product/" ) );
define ( "IMAGE_DIRECTORY_PRODUCT_PREVIEW", realpath ( APPLICATION_PATH . "/../{$folder}/images/product/preview/" ) );
define ( "IMAGE_DIRECTORY_SLIDE", realpath ( APPLICATION_PATH . "/../{$folder}/images/slide/" ) );
define ( "IMAGE_DIRECTORY_SLIDE_PREVIEW", realpath ( APPLICATION_PATH . "/../{$folder}/images/slide/preview/" ) );
define ( "IMAGE_DIRECTORY_NEWS", realpath ( APPLICATION_PATH . "/../{$folder}/images/news/" ) );
define ( "IMAGE_DIRECTORY_NEWS_PREVIEW", realpath ( APPLICATION_PATH . "/../{$folder}/images/news/preview/" ) );

define ( "RESOURCE_PATH", realpath ( APPLICATION_PATH . "/../resource" ) );
define ( "CATEGORY_IMAGE_PATH", "/images/category" );
define ( "CATEGORY_IMAGE_PATH_PREVIEW", "/images/category/preview" );
define ( "PRODUCT_IMAGE_PATH", "/images/product" );
define ( "PRODUCT_IMAGE_PATH_PREVIEW", "/images/product/preview" );
define ( "SLIDE_IMAGE_PATH", "/images/slide" );
define ( "PREVIEW_SLIDE_IMAGE_PATH", "/images/slide/preview" );
define ( "NEWS_IMAGE_PATH", "/images/news" );
define ( "PREVIEW_NEWS_IMAGE_PATH", "/images/news/preview" );
define ( "THUMBNAIL_IMAGE_MAX_WIDTH", 200 );
define ( "THUMBNAIL_IMAGE_MAX_HEIGHT", 150 );
define ( "SESSION_LIFETIME", 60 * 60 * 1 ); // 1h
define ( "SESSION_NAMESPACE", "session.chatdm" );

define ( "SEO_URL", TRUE );
define ( "URL_LIST_PRODUCT", "san-pham" );
define ( "URL_DETAIL_PRODUCT", "chi-tiet" );

define ( "URL_NEWS_DETAIL", "tin-tuc" );
define ( "URL_NEWS_LIST", "danh-sach-tin-tuc" );
define ( "URL_SERVICES", "dich-vu" );

define ( "END_URL", "html" );
define ( "PAGGING_LIMIT", 20 );
define ( "PAGE_OF_SCREEN", 3 );

define ( "RESOURCE_IMAGE_UPLOADED", realpath ( APPLICATION_PATH . "/../{$folder}/uploaded" ) );
