<?php
class Player
{
  function Login()
  {
    include("conJogo.php");
    $request = $pdo->prepare("SELECT * FROM accounts where name = :login");
    $request->bindParam(":login", $_POST['username']);
    $request->execute();
    if ($request->rowCount() == 0) {
      echo "Conta não cadastrada";
    } else {
      $infos = $request->fetch(PDO::FETCH_ASSOC);
      if ($infos['password'] == sha1($_POST['password'])) {
        session_start();
        $_SESSION           = $infos;
        $_SESSION['online'] = true;
        echo "Logado com sucesso";
      } else {
        echo "Senha incorreta!";
      }
    }
  }

  function getCharacters()
  {
    include("conJogo.php");
    $request = $pdo->prepare("SELECT * from characters WHERE accountid =" . $_SESSION['id']);
    $request->execute();
    if ($request->rowCount() == 0) {
      echo "<p class='alert alert-warning'> Você não tem nenhum personagem cadastrado! </p>";
      return false;
    }
    while ($assoc = $request->fetch(PDO::FETCH_ASSOC)) {
      echo "<option value='{$assoc['id']}'>{$assoc['name']}</option>";
    }
  }

  function Move($id)
  {
    include("conJogo.php");
    try {
      $q       = "SELECT loggedin from accounts WHERE id = :id AND loggedin = '0'";
      $request = $pdo->prepare($q);
      $request->bindParam(":id", $_SESSION['id']);
      $request->execute();
      $q = $request->fetch(PDO::FETCH_ASSOC);
      if ($q['loggedin'] == 2) {
        echo "<div class='alert alert-warning text-center vaipls'>Você precisa estar deslogado para utilizar essa função!</div>";
        return false;
      }
      $request1 = $pdo->prepare("SELECT c.id FROM accounts a JOIN characters c ON a.id = c.accountid WHERE a.id = :id AND c.id = :cid");
      $request1->bindParam(":cid", $id);
      $request1->bindParam(":id", $_SESSION['id']);
      $request1->execute();
      if ($request1->rowCount() == 1) {
        $request2 = $pdo->prepare("UPDATE characters SET map = 100000000 WHERE id = :id");
        $request2->bindParam(":id", $id);
        $request2->execute();
        $request3 = $pdo->prepare("DELETE FROM savedlocations WHERE accountid = :id");
        $request3->bindParam(":id", $id);
        $request3->execute();
        echo "<div class='alert alert-warning text-center'>Personagem movido com sucesso!</div>";
      } else {
        echo "<div class='alert alert-success text-center'>Não tente trocar os amiguinhos de mapa</div>";
        return false;
      }
    }
    catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  function Disconnect()
  {
    include("conJogo.php");
    try {
      $request = $pdo->prepare("SELECT loggedin FROM accounts WHERE id = :id");
      $request->bindParam(":id", $_SESSION['id']);
      $request->execute();
      if ($request->rowCount() == 1) {
        $q = $request->fetch(PDO::FETCH_ASSOC);
        if ($q['loggedin'] == 2) {
          $update = $pdo->prepare("UPDATE accounts SET loggedin = 0 WHERE id = :id");
          $update->bindParam(":id", $_SESSION['id']);
          if ($update->execute()) {
            echo "<div class='alert alert-success text-center'>Conta deslogada com sucesso!</div>";
          }
        } else {
          echo "<div class='alert alert-info text-center'>Sua conta já esta deslogada. Por favor, tente logar normalmente!</div>";
          return false;
        }
      }
    }
    catch (PDOException $e) {
      echo $e->getMessage();
    }
  }
}
