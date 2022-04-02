<?php
require_once('./crud/read.php');
require_once('./var.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD EXAMPLE</title>

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <h1 class="text-center mt-4">Data Mahasiswa</h1>

    <div class="container mt-5">
        <?php if (isset($_GET['status'])) : ?>
            <?php
            $message = '';
            $color = '';
            if ($_GET['status'] == 1) {
                $message = 'Berhasil ' . $_GET['aksi'] . ' Data Mahasiswa';
                $color = 'alert-success';
            } else {
                $message = 'Gagal ' . $_GET['aksi'] . ' Data Mahasiswa';
                $color = 'alert-danger';
            }

            ?>
            <div class="alert alert-dismissible fade show <?= $color ?>" role="alert">
                <?= $message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addMahasiswa">
            Tambah
        </button>
        <table class="table table-bordered table-striped table-hover text-center">
            <thead>
                <tr>
                    <th scope="col" class="col-1">No</th>
                    <th scope="col" class="col-3">Name</th>
                    <th scope="col" class="col-2">Age</th>
                    <th scope="col" class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $mhs['name']; ?></td>
                        <td><?= $mhs['age']; ?></td>
                        <td>
                            <button class="btn btn-warning text-white btn-edit" data-id="<?= $mhs['id'] ?>" data-name="<?= $mhs['name'] ?>" data-age="<?= $mhs['age'] ?>" onclick="handleEdit(this)" data-bs-toggle="modal" data-bs-target="#editMahasiswa"><i class='bx bx-pencil'></i></button>
                            <a href="<?= $base_url ?>crud/delete.php?id=<?= $mhs['id'] ?>" class="btn btn-danger text-white" onclick="return confirm('Are u sure?')"><i class='bx bx-trash'></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= $base_url ?>crud/create.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="row mb-3">
                            <label for="name" class="col-form-label col-2">Name</label>
                            <div class="col-10">
                                <input type="text" class="form-control col-8" id="name" name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="age" class="col-form-label col-2">Age</label>
                            <div class="col-10">
                                <input type="number" class="form-control" id="age" name="age">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div class="modal fade" id="editMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="<?= $base_url ?>crud/update.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-5">
                        <input type="hidden" id="id-edit" name="id">
                        <div class="row mb-3">
                            <label for="name" class="col-form-label col-2">Name</label>
                            <div class="col-10">
                                <input type="text" class="form-control col-8" id="name-edit" name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="age" class="col-form-label col-2">Age</label>
                            <div class="col-10">
                                <input type="number" class="form-control" id="age-edit" name="age">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning text-white">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        function handleEdit(elem) {
            const id = elem.dataset.id;
            const name = elem.dataset.name;
            const age = elem.dataset.age;

            const idField = document.getElementById('id-edit');
            const nameField = document.getElementById('name-edit');
            const ageField = document.getElementById('age-edit');

            idField.value = id;
            nameField.value = name;
            ageField.value = age;

        }
    </script>
</body>

</html>