<?php

/*
Plugin Name: SyntaxHighlighter Evolved: Extra Brushes
Description: Adds support for the Haskell language to the SyntaxHighlighter Evolved plugin.
Author: Alessandro Vermeulen
Version: 1.0.0
Author URI: http://alessandrovermeulen.me
*/
/*
Copyright (c) 2009 Alessandro Vermeulen <me@alessandrovermeulen.me>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
// SyntaxHighlighter Evolved doesn't do anything until early in the "init" hook, so best to wait until after that
add_action( 'init', 'syntaxhighlighter_haskell_regscript' );

// Tell SyntaxHighlighter Evolved about this new language/brush
add_filter( 'syntaxhighlighter_brushes', 'syntaxhighlighter_haskell_addlang' );

// Register the brush file with WordPress
function syntaxhighlighter_haskell_regscript() {
	wp_register_script( 'syntaxhighlighter-brush-haskell', plugins_url( 'shBrushHaskell.js', __FILE__ ), array('syntaxhighlighter-core'), '1.2.3' );
}

// Filter SyntaxHighlighter Evolved's language array
function syntaxhighlighter_haskell_addlang( $brushes ) {
	$brushes['haskell'] = 'haskell';
	$brushes['hs'] = 'haskell';

	return $brushes;
}

add_filter( 'syntaxhighlighter_themes', 'syntaxhighlighter_textmate_addtheme' );

function syntaxhighlighter_textmate_addtheme( $themes ) {
  wp_register_style( 'syntaxhighlighter-theme-textmate', plugins_url( 'shThemeTextMate.css', __FILE__ ), array('syntaxhighlighter-core'), '1.2.3' );
  
	$themes['textmate'] = 'TextMate';

	return $themes;
}

?>