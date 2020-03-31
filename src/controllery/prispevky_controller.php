<?php

class PrispevkyController
{
    public function pridani()
    {
        require_once "viewy/prispevky/pridani.php";
    }
    public function edit()
    {
        require_once "viewy/prispevky/edit.php";
    }
    public function vymazat()
    {
        require_once "viewy/prispevky/vymazat.php";
    }

    public function pridat()
    {
        $nadpis = trim($_POST["nadpis"]);
        $obsah = trim($_POST["obsah"]);

        $prispevek = Prispevek::ulozit($nadpis, $obsah);

        if($prispevek)
        {
            $_GET["id"] = $prispevek->id;
            return spustit("prispevky", "detail");
        }
        else
            return spustit("prispevky", "chyba");
    }

    public function detail()
    {
        $id = $_GET["id"];
        $prispevek = Prispevek::nacist($id);

        require_once "viewy/prispevky/detail.php";
    }

    public function chyba()
    {
        require_once "viewy/prispevky/chyba.php";
    }

    public function prehled()
    {
        $prispevky = Prispevek::nacistVsechny();

        require_once "viewy/prispevky/prehled.php";
    }
}
