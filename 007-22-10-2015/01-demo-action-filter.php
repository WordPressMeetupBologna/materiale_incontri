<?php namespace WP_Meetup_Bologna;
/**
 * Plugin Name: 01 Demo WordPress Mettup Bologna
 * Plugin URI: http://www.meetup.com/it/WordPress-Meetup-Bologna/
 * Description: Vediamo filtri e azioni come funzionano.
 * Version: 1.0.0
 * Author: Enea Overclokk, lucatume
 * Author URI: https://github.com/WordPressMeetupBologna
 * Text Domain: wordpress-meetup-bologna
 * License: GPLv2 or later
 *
 * @package WordPress Mettup Bologna
 * @since 1.0.0
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as 
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * This will make shure the plugin files can't be accessed within the web browser directly.
 */
if ( !defined( 'WPINC' ) )
    die;

/**
 * Esempio di una funzione per modificare il titolo
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/the_title
 * @param  string $title Titolo della pagina/articolo
 * @param  int    $id    ID della pagina/articolo Default null
 * @return string        Ritorno il titolo modificato
 */
function modifica_titolo( $title, $id = null ){

	// var_dump($title);

	$title = 'Titolo modificato ' . $title;

	// var_dump($title);

	return $title;

}
/**
 * @link https://codex.wordpress.org/Function_Reference/add_filter
 */
add_filter( 'the_title', 'WP_Meetup_Bologna\modifica_titolo', 10, 2 );

/**
 * Esempio di una funzione per modificare il contenuto
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/the_content
 * @param  string $content Contenuto della pagina/articolo
 * @return string          Ritorno il contenuto modificato
 */
function modifica_contenuto( $content ){

	// var_dump($content);

	$content = 'Contenuto modificato ' . $content;

	// var_dump($content);

	return $content;

}
add_filter( 'the_content', 'WP_Meetup_Bologna\modifica_contenuto' );


/**
 * ACTIONS LIST
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference
 */
function hook_css_js() {

	$output = '';

	/**
	 * @link https://codex.wordpress.org/Function_Reference/do_action
	 */
	do_action( 'demo_before_output' );

	// $output = '<style>body { background-color : #ccc; } </style>';

	$output = "<script> alert('Page is loading...'); </script>";

	/**
	 * @link https://codex.wordpress.org/Function_Reference/apply_filters
	 */
	$output = apply_filters( 'demo_output', $output );

	echo $output;

	do_action( 'demo_after_output' );

}
add_action('wp_head','WP_Meetup_Bologna\hook_css_js');






/**
 * Aggiungiamo un'azione prima dell'esecuzione di hook_css_js()
 * @return string        Mostro un alert prima dell'esecuzione di hook_css_js()
 */
function demo_add_action_before_output(){

	echo '<script> alert("Azione aggiunta prima di $output"); </script>';

}
// add_action('demo_before_output','WP_Meetup_Bologna\demo_add_action_before_output');


/**
 * Aggiungiamo un'azione dopo l'esecuzione di hook_css_js()
 * @return string        Mostro un alert dopo l'esecuzione di hook_css_js()
 */
function demo_add_action_after_output(){

	echo '<script> alert("Azione aggiunta dopo $output"); </script>';

}
// add_action('demo_after_output','WP_Meetup_Bologna\demo_add_action_after_output');






/**
 * Sostituiamo il contenuto di demo_output
 * @param  string $content Contenuto di demo_output
 * @return string          Nuovo contenuto
 */
function sostituisci_contenuto_demo_output( $content ){

	// var_dump($content);

	$content = '<script> alert("Contenuto demo_output modificato"); </script>';

	// var_dump($content);

	return $content;

}
// add_filter( 'demo_output', 'WP_Meetup_Bologna\sostituisci_contenuto_demo_output' );


/**
 * @link https://codex.wordpress.org/Function_Reference/remove_action
 */
// remove_action( 'demo_before_output','WP_Meetup_Bologna\demo_add_action_before_output', 10 );
// remove_action( 'demo_after_output', 'WP_Meetup_Bologna\demo_add_action_after_output', 10 );

/**
 * @link https://codex.wordpress.org/Function_Reference/remove_filter
 */
// remove_filter( 'demo_output', 'WP_Meetup_Bologna\sostituisci_contenuto_demo_output', 10 );
//