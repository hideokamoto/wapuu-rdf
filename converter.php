<?php
define( 'WAPUU_API', 'https://jawordpressorg.github.io/wapuu-api/v1/wapuu.json' );

function create() {
	$results = json_decode( file_get_contents( WAPUU_API ) );
	$rdfs = array();
	foreach ( $results as $dataset ) {
		$rdfs[] = convert_to_rdf( $dataset );
	}
	create_jsonld( $rdfs );
}

function convert_to_rdf( $dataset ) {
	$rdf = array(
		'@context' => 'http://schema.org',
		'@type' => 'ImageObject',
	);
	foreach ( $dataset as $key => $value ) {
		$schema = get_rdf_schema( $key );
		if ( $schema ) {
			$rdf[ $schema ] = $value;
		}
	}
	return $rdf;
}

function get_rdf_schema( $key ) {
	$schema = false;
	switch ( $key ) {
		case "description":
			$schema = 'diagram';
			break;

		case "id":
			$schema = '@id';
			break;

		case "name":
			$schema = 'name';
			break;

		case "github_url":
			$schema = 'url';
			break;

		case "wapuu_url":
			$schema = 'image';
			break;

		case "mimetype":
			$schema = 'fileFormat';
			break;

		case "author":
			$schema = 'creator';
			break;

		case "author_url":
			//@TODO:schema undefined.
			break;

	}
	return $schema;
}

function create_jsonld( $rdfs ) {
	$jsonld = json_encode( $rdfs );
	$font_file_path = './wapuu.jsonld';
	file_put_contents( $font_file_path, $jsonld );
}
