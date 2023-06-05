<?php

// Classe VendaMapper
class VendaMapper
{
    private static $conn;

    // Método setConnection()
    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }

    // Método save()
    public static function save(Venda $venda)
    {
        $date = date("Y-m-d");

        $sql = "INSERT INTO turma (data_venda) VALUES (:date)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->execute();

        $id = self::$conn->lastInsertId();
        $venda->setId($id);

        foreach ($venda->getItens() as $item) {
            $quantidade = $item[0];
            $produto = $item[1];
            $preco = $produto->preco;
            $idProduto = $produto->id;

            $sql = "INSERT INTO item_venda (id_venda, id_produto, quantidade, preco) VALUES (:id, :id_produto, :quantidade, :preco)";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':id_produto', $idProduto);           
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':preco', $preco);
            $stmt->execute();
        }
    }

    // Método delete()
    public static function delete($id)
    {
        $sql = "DELETE FROM venda WHERE id = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Método find()
    public static function find($id)
    {
        $sql = "SELECT * FROM venda WHERE id = :id";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    // Método all()
    public static function all()
    {
        $sql = "SELECT * FROM venda";
        $stmt = self::$conn->query($sql);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}

?>
