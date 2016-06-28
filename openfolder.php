<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>OpenFolder</title>
	<link rel="stylesheet" href="style.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: guillaumeremy-zephir
 * Date: 27/06/2016
 * Time: 10:24
 */

$nb_fichier = 0;
$searchfor  = 'BiomeColor';

echo '<ul>';

if ( $dossier = opendir( './WorldBiomes' ) ) {

	while ( false !== ( $fichier = readdir( $dossier ) ) ) {

		if ( $fichier != '.' && $fichier != '..' && $fichier != 'index.php' ) {
			$nb_fichier ++;

			$myfile  = file( './WorldBiomes/' . $fichier );
			$pattern = '/#([a-f]|[A-F]|[0-9]){3}(([a-f]|[A-F]|[0-9]){3})?\b/i';
			preg_match( $pattern, $myfile['45'], $matches, PREG_OFFSET_CAPTURE );

			echo '<li style="background:' . reset( reset( $matches ) ) . '"><a href="./WorldBiomes/' . $fichier . '">' . $fichier . '</a><br />'; ?>
			<span class="hexaNumber"><?php echo reset( reset( $matches ) ); ?></span><br/>
			<span class="totalColor-<?php echo substr( reset( reset( $matches)), 1) ?>"></span>
			</li>

			<?php
			fclose( $myfile );
		}
	}

	echo '</ul><br />';
} else {
	echo 'Le dossier n\' a pas pu être ouvert';
}

echo 'Il y a <strong>' . $nb_fichier . '</strong> fichiers';
closedir( $dossier );

?>

<script src="count.js"></script>
</body>
</html>