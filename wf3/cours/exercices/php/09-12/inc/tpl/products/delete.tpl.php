<?php
# Le fichier doit être inclus
if( ! session_id() ) exit;

if( empty($_GET['id']) )
{
    header('Location: ' . SITE_URL . '?p=products&err=0');
    exit;
}
?>
supprimer un produit
