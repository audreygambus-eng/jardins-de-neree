<?php

class Tarif
{
    public static function findAll() : array
    {
        $pdo = Database::getInstance();
        $sql = 'SELECT id, libelle, prix, description, image, compte_visite, compte_vr
                FROM tarif
                ORDER BY id';
        return $pdo->query($sql)->fetchAll();
    }
}