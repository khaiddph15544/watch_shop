<?php
class database
{
   public $conn;
   public function __construct()
   {
      $this->connect();
   }
   public function connect()
   {
      try {
         $this->conn = new PDO("mysql:host=localhost;dbname=sample_project; charset=utf8", "root", "");
         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $error) {
         echo "lỗi kết nối:" . $error->getMessage();
      }
   }
   //  dùng để lấy nhiều đối tượng
   public function select_all($sql_all)
   {
      try {
         $stmt = $this->conn->prepare($sql_all);
         $stmt->execute();
         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $result;
      } catch (PDOException $error) {
         echo "lỗi kết nối:" . $error->getMessage();
      } finally {
         unset($conn);
      }
   }
   // dùng để lấy một đối tượng
   public function select_one($sql_one)
   {
      try {
         $stmt = $this->conn->prepare($sql_one);
         $stmt->execute();
         $result = $stmt->fetch(PDO::FETCH_ASSOC);
         return $result;
      } catch (PDOException $error) {
         echo "lỗi kết nối:" . $error->getMessage();
      } finally {
         unset($conn);
      }
   }
   // thực hiện các chức năng
   public function exec($sql_exec)
   {
      try {
         $stmt = $this->conn->prepare($sql_exec);
         $stmt->execute();
      } catch (PDOException $error) {
         echo "lỗi kết nối:" . $error->getMessage();
      } finally {
         unset($conn);
      }
   }
}
