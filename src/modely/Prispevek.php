<?php

class Prispevek
{
    public $id;
    public $nadpis;
    public $obsah;

    public function __construct($id, $nadpis, $obsah)
    {
        $this->id = $id;
        $this->nadpis = $nadpis;
        $this->obsah = $obsah;
    }

    static public function ulozit($nadpis, $obsah)
    {
        $spojeni = DB::pripojit();

        $dotaz = "INSERT INTO 3ep_sk2_php_mvc_prispevky (nadpis, obsah) VALUES ('$nadpis', '$obsah')";
        $vysledek = mysqli_query($spojeni, $dotaz);

        if($vysledek)
            return new Prispevek(mysqli_insert_id($spojeni), $nadpis, $obsah);
        else
            return null;
    }

    static public function zmenit($nadpis, $obsah)
    {
        $spojeni = DB::pripojit();

        $dotaz = "UPDATE 3ep_sk2_php_mvc_prispevky SET obsah = '$obsah' WHERE nadpis = '$nadpis'";
        $vysledek = mysqli_query($spojeni, $dotaz);

        if($vysledek)
            return new Prispevek(mysqli_insert_id($spojeni), $nadpis, $obsah);
        else
            return null;
    }

    static public function vymaz($nadpis)
    {
        $spojeni = DB::pripojit();

        $dotaz = "DELETE FROM 3ep_sk2_php_mvc_prispevky WHERE nadpis = '$nadpis'";
        $vysledek = mysqli_query($spojeni, $dotaz);

        if($vysledek)
            return new Prispevek(mysqli_insert_id($spojeni), $nadpis);
        else
            return null;
    }



    static public function nacist($id)
    {
        $spojeni = DB::pripojit();

        $dotaz = "SELECT * FROM 3ep_sk2_php_mvc_prispevky WHERE id = '$id'";
        $vysledek = mysqli_query($spojeni, $dotaz);
        
        if(mysqli_num_rows($vysledek))
        {
            $data = mysqli_fetch_assoc($vysledek);

            $id = $data["id"];
            $nadpis = $data["nadpis"];
            $obsah = $data["obsah"];

            return new Prispevek($id, $nadpis, $obsah);
        }
        else
        {
            return null;
        }
    }

    static public function nacistVsechny()
    {
        $spojeni = DB::pripojit();

        $dotaz = "SELECT * FROM 3ep_sk2_php_mvc_prispevky";
        $vysledek = mysqli_query($spojeni, $dotaz);

        $prispevky = [];

        foreach($vysledek as $polozka)
        {
            $id = $polozka["id"];
            $nadpis = $polozka["nadpis"];
            $obsah = $polozka["obsah"];

            $prispevky[] = new Prispevek($id, $nadpis, $obsah);
        }

        return $prispevky;
    }
}
