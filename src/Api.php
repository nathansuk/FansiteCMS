<?php


namespace App;


class Api {

    private $data;
    private $apiKey;
    private $userName;
    private $erreur;

    private static function cURL($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response);
    }

    public function __construct($userName) {
        $this->userName = $userName;
        $this->apiKey = getenv('API_KEY');
        $this->data = Api::cURL("https://api.habbocity.me/avatar_info.php?key=Cr53Rcgt67&user=".$this->userName."&selectedBadges&wealth&rooms&lastTweets");
        $this->checkErreur();
    }

    public function getId(): int {
        return $this->data->uniqueId;
    }

    public function getName(): string {
        return $this->data->name;
    }

    public function getMission(): string {
        return $this->data->motto;
    }

    public function getAvatar(): string {
        return $this->data->avatar;
    }

    public function getOnline(): bool {
        return $this->data->online;
    }

    public function getRegister(): int {
        return $this->data->register;
    }

    public function getDiamonds(): int {
        return $this->data->diamonds;
    }

    public function getRooms(): array{
        return $this->data->rooms;
    }

    public function getWealth(): array {
        return $this->data->wealth;
    }

    public function __toString(): string
    {
        return $this->data->wealth->date;
    }

    public function getListBadge(): ?array {

        if($this->erreur != null)
            return null;

        return json_decode(json_encode($this->data->selectedBadges),true);
    }

    public function getListGroupe(): ?array {
        if($this->erreur != null) return null;
        return json_decode(json_encode($this->data->joinGroup),true);
    }

    private function checkErreur(): void {

        if($this->data == null) {
            $this->erreur = "Nous avons pas rÃ©ussi Ã  effectuer la requÃªte vers le serveur d'HabboCity.";
        } else {

            /*
            if(array_key_exists("type", $this->data) && $this->data->type == "error")
                $this->erreur = $this->data->message;
            */
        }
    }

    public function getErreur() {
        return $this->erreur;
    }

}