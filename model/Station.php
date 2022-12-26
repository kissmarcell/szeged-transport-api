<?php
// TODO: rework to use live website instead of database
class Station {
    public int $id;
    public string $name;
    public string $latitude;
    public string $longitude;
    public int $accessibility;

    public function __construct($id, $name, $latitude, $longitude, $accessibility) {
        $this->id = $id;
        $this->name = $name;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->accessibility = (bool)$accessibility;
    }

    /**
     * Function wrapping constructor to be able to use PDO::FETCH_FUNC
     * @param $id               int
     * @param $name             string
     * @param $latitude         string
     * @param $longitude        string
     * @param $accessibility    int
     * @return Station
     */
    public static function buildFromPDO(int $id, string $name, string $latitude, string $longitude, int $accessibility): Station
    {
        return new Station($id, $name, $latitude, $longitude, $accessibility);
    }

    /**
     * Get all stations from the database
     * @param   object $pdo PDO object
     * @return  array<Station>  Array of Station objects
     */
    public static function getAllStations(object $pdo): array
    {
        $sql = "SELECT * FROM stations";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_FUNC, "Station::buildFromPDO");
    }

    /**
     * Get stations from the database by name
     *
     * @param   object $pdo PDO object
     * @param   string $name Station name
     * @return  array<Station>  Array of Station objects
     */
    public static function getStationsByName(object $pdo, string $name): array
    {
        $sql = "SELECT * FROM stations WHERE name LIKE CONCAT('%', :name, '%')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["name" => $name]);
        return $stmt->fetchAll(PDO::FETCH_FUNC, "Station::buildFromPDO");
    }

    /**
     * Get station from the database by id
     *
     * @param   object $pdo PDO object
     * @param   int $id Station id
     * @return  array<Station>  Array of Station objects
     */
    public static function getStationByID(object $pdo, int $id): array
    {
        $sql = "SELECT * FROM stations WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["id" => $id]);
        return $stmt->fetchAll(PDO::FETCH_FUNC, "Station::buildFromPDO");
    }
}
