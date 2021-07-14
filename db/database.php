<?php

    class DatabaseHelper {

        private $db;

        public function __construct($servername, $username, $password, $dbname, $port) {
            
            $this->db = new mysqli($servername, $username, $password, $dbname, $port);
            if ($this->db->connect_error) die("Connessione al db fallita");
        }

        public function checkLogin($username, $password) {
            
            $query = $this->db->prepare("SELECT Password FROM Utenti WHERE Username = ?");
            $query->bind_param("s", $username);
            $query->execute();
            $res = $query->get_result();
            $res = $res->fetch_all(MYSQLI_ASSOC);
            $hash = $res[0]['Password'];
            
            if (password_verify($password, $hash)) {
                
                $query = $this->db->prepare("SELECT Username, Privilegi FROM Utenti WHERE Username = ?");
                $query->bind_param("s", $username);
                $query->execute();
                $res = $query->get_result();
                return $res->fetch_all(MYSQLI_ASSOC);

            } else return array();
        }

        public function getAlbums() {

            $query = $this->db->prepare("SELECT * FROM Album");
            $query->execute();
            $res = $query->get_result();
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        public function getAlbumsFiltered($band, $genre, $year) {

            $query = $this->db->prepare("SELECT * FROM Album WHERE Band LIKE ? AND Genere LIKE ? AND Anno LIKE ?");
            $query->bind_param("sss", $band, $genre, $year);
            $query->execute();
            $res = $query->get_result();
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        public function getGenres() {

            $query = $this->db->prepare("SELECT Genere FROM Album");
            $query->execute();
            $res = $query->get_result();
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        public function getBands() {

            $query = $this->db->prepare("SELECT Band FROM Album");
            $query->execute();
            $res = $query->get_result();
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        public function getYears() {

            $query = $this->db->prepare("SELECT Anno FROM Album");
            $query->execute();
            $res = $query->get_result();
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        public function getOrders() {

            $query = $this->db->prepare("SELECT * FROM Ordini");
            $query->execute();
            $res = $query->get_result();
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        public function getAlbumFromId($id) {

            $query = $this->db->prepare("SELECT * FROM Album WHERE Id = ?");
            $query->bind_param("i", $id);
            $query->execute();
            $res = $query->get_result();
            return $res->fetch_all(MYSQLI_ASSOC);
            
        }

        public function maxAlbumId() {
            
            $query = $this->db->prepare("SELECT MAX(Id) as Max FROM Album");
            $query->execute();
            $res = $query->get_result();
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        public function getCartQuantity($username, $albumid) {
            
            $query = $this->db->prepare("SELECT Quantità FROM Carrelli WHERE Username = ? AND AlbumId = ?");
            $query->bind_param("si", $username, $albumid);
            $query->execute();
            $res = $query->get_result();
            return $res->fetch_all(MYSQLI_NUM);
        }

        public function insertCartItems($username, $albumid, $quantity) {

            $query = $this->db->prepare("SELECT COUNT(1) AS Test WHERE EXISTS (SELECT * From Carrelli WHERE Username = ? AND AlbumId = ?)");
            $query->bind_param("si", $username, $albumid);
            $query->execute();
            $res = $query->get_result();
            $row = $res->fetch_all(MYSQLI_ASSOC);
            $row = $row[0];

            if ($row['Test']) {
                $query = $this->db->prepare("UPDATE Carrelli SET Quantità = Quantità + ? WHERE Username = ? AND AlbumId = ?");
                $query->bind_param("isi", $quantity, $username, $albumid);
                $query->execute();
                return;
            }
            else {

                $query = $this->db->prepare("INSERT INTO Carrelli VALUES (?,?,?)");
                $query->bind_param("sii", $username, $albumid, $quantity);
                $query->execute();
                return;
            }
        }

        public function getCartItems($username) 
        {
            $query = $this->db->prepare("SELECT * FROM Carrelli WHERE Username = ?");
            $query->bind_param("s", $username);
            $query->execute();
            $res = $query->get_result();
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        public function removeCartItem($username, $albumid) {

            $query = $this->db->prepare("DELETE FROM Carrelli WHERE Username = ? AND AlbumId = ?");
            $query->bind_param("ii", $username, $albumid);
            $query->execute();
            return;
        }


        public function addItem($title, $band, $img, $desc, $genre, $price, $stock, $year) {

            $query = $this->db->prepare("SELECT COUNT(Id) AS id FROM Album");

            if ($query) {
                $query->execute();
                $res = $query->get_result();
                $row = $res->fetch_all(MYSQLI_ASSOC);
                $row = $row[0];
                $id = $row['id'] + 1;
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }


            $query = $this->db->prepare("INSERT INTO Album VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

            if ($query) {
                $query->bind_param("isssssiii", $id, $title, $band, $img, $desc, $genre, $price, $stock, $year);
                $query->execute();
                return;
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
                return;
            }
        }

        public function updateItem($title, $band, $img, $desc, $genre, $price, $stock, $year, $id) {

            $query = $this->db->prepare("UPDATE Album SET Titolo = ?, Band = ?, Imgalbum = ?, Descrizione = ?, Genere = ?, Prezzo = ?, Rimanenza = ?, Anno = ? WHERE Id = ?");

            if ($query) {
                $query->bind_param("sssssiiii", $title, $band, $img, $desc, $genre, $price, $stock, $year, $id);
                $query->execute();
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }
            
            return;
        }

        public function deleteItem($id) {

            $query = $this->db->prepare("DELETE FROM Album WHERE Id = ?");

            if ($query) {
                $query->bind_param("i", $id);
                $query->execute();
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }
            
            return;
        }

        public function registerUser($nome, $cognome, $email, $pass, $address, $city, $state, $zip, $ccnumber, $ccexp, $cccvv) {

            $query = $this->db->prepare("INSERT INTO Utenti VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0)");

            if ($query) {
                $query->bind_param("sssssssiisi", $email, $pass, $nome, $cognome, $address, $city, $state, $zip, $ccnumber, $ccexp, $cccvv);
                $query->execute();
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }
            
            return;
        }

        public function registerAdmin($username, $password) {

            $query = $this->db->prepare("INSERT INTO Utenti (Username, Password, Privilegi) VALUES (?, ?, 1)");

            if ($query) {
                $query->bind_param("ss", $username, $password);
                $query->execute();
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }
            
            return;
        }

        public function getUser($username) {

            $query = $this->db->prepare("SELECT * FROM Utenti WHERE Username = ?");

            if ($query) {
                $query->bind_param("s", $username);
                $query->execute();
                $res = $query->get_result();
                return $res->fetch_all(MYSQLI_ASSOC);
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }
            
            return;
        }

        public function updatePData($nome, $cognome, $indirizzo, $citta, $stato, $zip, $user) {

            $query = $this->db->prepare("UPDATE Utenti SET Nome = ?, Cognome = ?, Indirizzo = ?, Citta = ?, Stato = ?, CodP = ? WHERE Username = ?");

            if ($query) {
                $query->bind_param("sssssis", $nome, $cognome, $indirizzo, $citta, $stato, $zip, $user);
                $query->execute();
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }
            
            return;
        }

        public function updateCCData($ccnumber, $ccexp, $cccvv, $user) {

            $query = $this->db->prepare("UPDATE Utenti SET CCNumero = ?, CCScadenza = ?, CCVV = ? WHERE Username = ?");

            if ($query) {
                $query->bind_param("isis", $ccnumber, $ccexp, $cccvv, $user);
                $query->execute();
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }
            
            return;
        }

        public function passwordReset($user, $pass) {

            $query = $this->db->prepare("UPDATE Utenti SET Password = ? WHERE Username = ?");

            if ($query) {
                $query->bind_param("ss", $pass, $user);
                $query->execute();
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }
            
            return;
        }

        public function insertOrder($user, $imp, $data,
                                    $nome, $cognome, $indirizzo, $citta, $stato, $zip, 
                                    $ccnumber, $ccexp, $cccvv, $cartItem) {

            $query = $this->db->prepare("SELECT COUNT(Id) AS id FROM Ordini");

            if ($query) {
                $query->execute();
                $res = $query->get_result();
                $row = $res->fetch_all(MYSQLI_ASSOC);
                $row = $row[0];
                $id = $row['id'] + 1;
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }

            $query = $this->db->prepare("INSERT INTO Ordini VALUES (?, ?, $imp, ?, 1) ");

            if ($query) {
                $query->bind_param("iss", $id, $user, $data);
                $query->execute();
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }
            
            $query = $this->db->prepare("INSERT INTO OrdiniDati VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            if ($query) {
                $query->bind_param("isssssiisi", $id, $nome, $cognome, $indirizzo, $citta, $stato, $zip, $ccnumber, $ccexp, $cccvv);
                $query->execute();
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }

            foreach ($cartItem as $item) {

                $query = $this->db->prepare("INSERT INTO OrdiniCarrello VALUES (?, ?, ?, ?)");

                if ($query) {
                    $query->bind_param("isii", $id, $user, $item['AlbumId'], $item['Quantità']);
                    $query->execute();
                } else {
                    $err = $this->db->errno . ' ' . $this->db->error;
                    echo $err;
                }

                $query = $this->db->prepare("UPDATE Album SET Rimanenza = Rimanenza - ? WHERE Id = ?");

                if ($query) 
                {
                    $query->bind_param("ii", $item['Quantità'], $item['AlbumId']);
                    $query->execute();
                } 
                else 
                {
                    $err = $this->db->errno . ' ' . $this->db->error;
                    echo $err;
                }

            }

            $query = $this->db->prepare("DELETE FROM Carrelli WHERE Username = ?");

            if ($query) {
                $query->bind_param("s", $user);
                $query->execute();
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }


            return;

        }

        public function getOrderItems($orderId) {

            $query = $this->db->prepare("SELECT * FROM OrdiniCarrello WHERE IdOrdine = ?");

            if ($query) {
                $query->bind_param("i", $orderId);
                $query->execute();
                $res = $query->get_result();
                return $res->fetch_all(MYSQLI_ASSOC);
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }
            
            return;
        }


        public function updateOrderStatus($status, $id) {

            $query = $this->db->prepare("UPDATE Ordini SET Status = ? WHERE Id = ?");

            if ($query) {
                $query->bind_param("ii", $status, $id);
                $query->execute();
            } else {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }

            if ($status == '4') 
            {
                $albums;
                $query = $this->db->prepare("SELECT * FROM OrdiniCarrello WHERE IdOrdine = ?");

                if ($query) 
                {
                    $query->bind_param("i", $id);
                    $query->execute();
                    $res = $query->get_result();
                    $albums =  $res->fetch_all(MYSQLI_ASSOC);

                    foreach($albums as $album) 
                    {
                        $query = $this->db->prepare("UPDATE Album SET Rimanenza = Rimanenza + ? WHERE Id = ?");

                        if ($query) 
                        {
                            $query->bind_param("ii", $album['Quantità'], $album['AlbumId']);
                            $query->execute();
                        } 
                        else 
                        {
                            $err = $this->db->errno . ' ' . $this->db->error;
                            echo $err;
                        }
                    }
                } 
                else 
                {
                    $err = $this->db->errno . ' ' . $this->db->error;
                    echo $err;
                }
            }
            else if ($status == '1')
            {
                                $albums;
                $query = $this->db->prepare("SELECT * FROM OrdiniCarrello WHERE IdOrdine = ?");

                if ($query) 
                {
                    $query->bind_param("i", $id);
                    $query->execute();
                    $res = $query->get_result();
                    $albums =  $res->fetch_all(MYSQLI_ASSOC);

                    foreach($albums as $album) 
                    {
                        $query = $this->db->prepare("UPDATE Album SET Rimanenza = Rimanenza + ? WHERE Id = ?");

                        if ($query) 
                        {
                            $query->bind_param("ii", $album['Quantità'], $album['AlbumId']);
                            $query->execute();
                        } 
                        else 
                        {
                            $err = $this->db->errno . ' ' . $this->db->error;
                            echo $err;
                        }
                    }
                } 
                else 
                {
                    $err = $this->db->errno . ' ' . $this->db->error;
                    echo $err;
                }
            }
            
            return;
        }

        public function getOrdersOfUser($usr) {

            $query = $this->db->prepare("SELECT * FROM Ordini WHERE Username = ?");

            if ($query) 
            {
                $query->bind_param("s", $usr);
                $query->execute();
            } 
            else 
            {
                $err = $this->db->errno . ' ' . $this->db->error;
                echo $err;
            }


            $query->execute();
            $res = $query->get_result();
            return $res->fetch_all(MYSQLI_ASSOC);
        }


    }
?>