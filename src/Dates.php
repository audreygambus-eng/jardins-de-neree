<?php

class Dates
{
    private const JOURS = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];

    private const MOIS = ['', 'janvier', 'février', 'mars', 'avril', 'mai', 'juin',
                          'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];

    public static function enFrancais(string $date): string
    {
        $t = strtotime($date);
        return self::JOURS[date('w', $t)] . ' ' . date('j', $t) . ' '
             . self::MOIS[date('n', $t)] . ' ' . date('Y', $t);
    }
}