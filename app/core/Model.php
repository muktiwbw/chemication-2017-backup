<?php

class Model {

        protected $table;
        protected $db = 'heroku_78fc2ffc961623a';

        private function connect(){
            $conn;
            if(!isset($conn)){ // Jika tidak ada sambungan database yang tersambung
                $conn = new mysqli(
                    'us-cdbr-iron-east-04.cleardb.net', 
                    'be250162bc096d', 
                    'b1d55a08',
                    $this->db);
            }
            return $conn;
        }

        protected function query_this($query){
            $conn = $this->connect();
            $conn->query($query); // 1.) $result menyimpan hasil query dalam bentuk ASSOCIATIVE ARRAY
            $conn->close();
        }

        protected function query_this_and_return($query){
            $conn = $this->connect();
            $result = $conn->query($query); // 1.) $result menyimpan hasil query dalam bentuk ASSOCIATIVE ARRAY
            $conn->close();
            $rows_arr = array(); // 2.) Membuat wadah ARRAY untuk kumpulan record
            /*
                3.) $row_arr adalah suatu ARRAY yang berisi field2 dari satu record
                Semua record akan dikeluarkan dengan menggunakan fungsi fetch_assoc()
                selama $result ada isinya
            */
            while($row_arr = $result->fetch_assoc()) 
            {
                /*
                    4.) $row_arr yang tadinya adalah ARRAY kemudian diconvert menjadi bentuk OBJECT
                    dan disimpan dalam variabel sementara $row_obj.
                    Hal ini supaya pengaksesannya mudah.
                */
                $row_obj = (object) $row_arr;
                /*
                    5.) $row_obj kemudian dimasukkan ke dalam ARRAY $rows_arr untuk dikumpulkan.
                */
                $rows_arr[] = $row_obj;
            }
            
            /*
                6.) $rows_arr yang tadinya adalah ARRAY 
                kemudian diconvert ke bentuk OBJECT supaya bisa dilakukan foreach();
            */            
            $rows = (object) $rows_arr;
            return $rows;
        }

        // Insert
        public function create($array){

            $fields = [];
            $values = [];

            foreach ($array as $key => $value) {
                
                $fields[] = $key;
                $values[] = "'".$value."'";

            }

            $query = 'insert into '.$this->table.' ('.implode(', ', $fields).') values ('.implode(', ', $values).')';
            
            $this->query_this($query);

        }

        public function update($array, $conditions){
            
            $field; 
            $value;

            foreach ($array as $key => $val) {
                $field = $key;
                $value = "'".$val."'";
            }

            $query = 'update '.$this->table.' set '.$field.' = '.$value.' where '.$conditions;

            $this->query_this($query);
        }

        public function nullify($field, $conditions){

            $query = 'update '.$this->table.' set '.$field.' = NULL where '.$conditions;

            $this->query_this($query);
        }

        public function delete($conditions){

            $query = 'delete from '.$this->table.' where '.$conditions;

            $this->query_this($query);
        }

        public function to_single_row($object){
            $new_array = (array) $object;
            // var_dump($new_array);
            $row = $new_array[0];
            // var_dump($row);

            return $row;
        }

        public function find($conditions){          // Mengembalikan SATU row data. Biasanya dengan keyword field yang bersifat UNIQUE
            // echo $table.", ".$conditions;
            $rows = $this->where($conditions);
            $row = $this->to_single_row($rows);
            // var_dump($row);

            return $row;
        }

        public function all(){                        // Mengembalikan SEMUA data
            $query = "select * from $this->table";
            $rows = $this->query_this_and_return($query);

            return $rows;
        }

        public function only_where($fields, $conditions){       // Mengambil FIELD tertentu dari semua data DENGAN CONDITION
            $query = "select $fields from $this->table where $conditions";
            $rows = $this->query_this_and_return($query);

            return $rows;
        }

        public function get_me($query){ // ntahlah. basically bikin query sendiri
            $rows = $this->query_this_and_return($query);
            return $rows;
        }

        public function where($conditions){                 // Mengambil SEMUA FIELD dari semua data DENGAN CONDITION
            // echo $table.", ".$conditions;
            $query = "select * from $this->table where $conditions";
            // echo $query;
            $rows = $this->query_this_and_return($query);
            // var_dump($rows);

            return $rows;
        }

        public function count($conditions = ""){
            $query;
            if ($conditions != "") {
                $query = "select count(*) as count from $this->table where $conditions";
            }else{
                $query = "select count(*) as count from $this->table";
            }
            $rows = $this->query_this_and_return($query);
            $row = $this->to_single_row($rows);
            $value = $row->count;
            
            return $value;
        }

        public function max($field, $conditions = ""){

            $query;
            if ($conditions != "") {
                $query = "select max($field) as max from $this->table where $conditions";
            }else{
                $query = "select max($field) as max from $this->table";
            }
            $row = $this->query_this_and_return($query);
            $row = $this->to_single_row($row);
            $max = $row->max;
            // var_dump($row);
            // echo $max;
            if(!$max)
            {
                $max = 0;
            }

            return $max;

        }

        public function sum($field, $conditions = ""){

            $query;
            if ($conditions != "") {
                $query = "select sum($field) as sum from $this->table where $conditions";
            }else{
                $query = "select sum($field) as sum from $this->table";
            }

            $row = $this->query_this_and_return($query);
            $row = $this->to_single_row($row);
            $sum = $row->sum;

            return $sum;

        }   

        public function get_id($field, $value){             // Mengembalikan FIELD ID pada database

            $row = $this->find("$field = '$value'");
            $id = $row->id;

            return $id;

        }

}
