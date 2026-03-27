<?php

class Person {
    public $firstname;
    public $lastname;
    public $phone;
    public $address;

    public function __construct($firstname, $lastname, $phone, $address) {
        $this->firstname = $firstname;
        $this->lastname  = $lastname;
        $this->phone     = $phone;
        $this->address   = $address;
    }

    public function getFullName() {
        return $this->firstname . ' ' . $this->lastname;
    }
}

$person = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $person = new Person(
        htmlspecialchars($_POST['firstname']),
        htmlspecialchars($_POST['lastname']),
        htmlspecialchars($_POST['phone']),
        htmlspecialchars($_POST['address'])
    );
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            padding: 40px;
        }
        .container {
            width: 500px;
        }
        h2 {
            margin-bottom: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #aaa;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 80px;
            resize: vertical;
        }
        button {
            padding: 8px 20px;
            background-color: #34383e;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #000000;
        }
        .result {
            margin-top: 20px;
            font-size: 14px;
            line-height: 1.8;
        }
        .reset-link {
            display: inline-block;
            margin-top: 8px;
            font-size: 13px;
            color: #ffffff;
            text-decoration: none;
        }
        .reset-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">

    <form method="POST">
        <input type="text" name="firstname" placeholder="Firstname"
               value="<?= $person ? $person->firstname : '' ?>">
        <input type="text" name="lastname" placeholder="Lastname"
               value="<?= $person ? $person->lastname : '' ?>">
        <input type="text" name="phone" placeholder="Phone Number"
               value="<?= $person ? $person->phone : '' ?>">
        <textarea name="address" placeholder="Address"><?= $person ? $person->address : '' ?></textarea>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php if ($person): ?>
    <div class="result">
        <p>Hi, my name is <?= $person->getFullName() ?></p>
        <p>Phone Number : <?= $person->phone ?></p>
        <p>Address : <?= $person->address ?></p>
        <button class="reset-link" href="index.php">Reset</a>
    </div>
    <?php endif; ?>

</div>
</body>
</html>
