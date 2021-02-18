<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Details</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-light bg-primary col-md-12">
                <a href="#" class="navbar-brand">Dashboard</a>
            </nav>    
        </div>
        <div class="row">
            <div id="list-example" class="list-group col-md-1">
                <button type="button" class="list-group-item list-group-item-action list-group-item-primary" data-toggle="modal" href="#addDetails">ADD</button>
                <!-- add/edit details Modal -->
                <!--<script>
                //$('#addDetails').on('show.bs.modal', function (event) {
                //var button = $(event.relatedTarget) // Button that triggered the modal
                //var id = button.data('whatever')
                //}
                <script>
            -->
                <?php
                    if (isset($_GET['edit'])) {
                        $id = $_GET['edit'];
                        $update = true;
                        $result = mysqli_query($db, "SELECT * FROM users WHERE id=$id");
                    
                        if (count($result) == 1 ) {
                            $row = mysqli_fetch_array($result);
                            $name = $row['name'];
                            $phone = $row['phone'];
                            $email = $row['email'];
                            $gender = $row['gender'];
                            $district = $row['district'];
                            $address = $row['address'];
                        }
                    }
                ?>
                <div class="modal fade" id="addDetails" tabindex="-1" role="dialog" aria-labelledby="addDetailsTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addDetailsTitle">Add Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <form method="post" id="add-form">
                                <div class="form-group row">
                                        <label for="name-input" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name-input" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone-input" class="col-sm-2 col-form-label">Phone No.</label>
                                        <div class="col-sm-10">
                                        <input type="tel" class="form-control" id="phone-input" name="phone" required >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Email-input" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                        <input type="email" class="form-control" id="Email-input" name="email" required >
                                        </div>
                                    </div>
                                    <fieldset class="form-group">
                                        <div class="row">
                                        <legend class="col-form-label col-sm-2 pt-0">Gender </legend>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" required >
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" >
                                            <label class="form-check-label" for="female">
                                                Female
                                            </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="others" value="others" >
                                            <label class="form-check-label" for="others">
                                                Others
                                            </label>
                                            </div>
                                        </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row">
                                    <label for="dist-input" class="col-sm-2 col-form-label">District</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="dist-input" name="district" required>
                                                <option value="" selected disabled hidden>District</option>
                                                <option value="Angul">Angul</option>
                                                <option value="Balangir">Balangir</option>
                                                <option value="Balasore">Balasore</option>
                                                <option value="Bargarh">Bargarh</option>
                                                <option value="Bhadrak">Bhadrak</option>
                                                <option value="Boudh">Boudh</option>
                                                <option value="Cuttack">Cuttack</option>
                                                <option value="Deogarh">Deogarh</option>
                                                <option value="Dhenkanal">Dhenkanal</option>
                                                <option value="Gajapati">Gajapati</option>
                                                <option value="Ganjam">Ganjam</option>
                                                <option value="Jagatsinghapur">Jagatsinghapur</option>
                                                <option value="Jajpur">Jajpur</option>
                                                <option value="Jharsuguda">Jharsuguda</option>
                                                <option value="Kalahandi">Kalahandi</option>
                                                <option value="Kandhamal">Kandhamal</option>
                                                <option value="Kendrapara">Kendrapara</option>
                                                <option value="Kendujhar">Kendujhar (Keonjhar) </option>
                                                <option value="Khordha">Khordha</option>
                                                <option value="Koraput">Koraput</option>
                                                <option value="Malkangiri">Malkangiri</option>
                                                <option value="Mayurbhanj">Mayurbhanj</option>
                                                <option value="Nabarangpur">Nabarangpur</option>
                                                <option value="Nayagarh">Nayagarh</option>
                                                <option value="Nuapada">Nuapada</option>
                                                <option value="Puri">Puri</option>
                                                <option value="Rayagada">Rayagada</option>
                                                <option value="Sambalpur">Sambalpur</option>
                                                <option value="Sonepur">Sonepur</option>
                                                <option value="Sundargarh">Sundargarh</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="address-input" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <textarea id="address-input" name="address" rows="5" column="30"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                        <button type="submit" class="btn btn-outline-primary" name="add_detail">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
            <form method="post" action="index.php" id="show-form">
                <div class="form-row my-3">
                    <div class="col-auto">
                        <select class="form-control" id="dist" name="dist">
                            <option value="" selected disabled hidden>Select District</option>
                            <option value="Angul">Angul</option>
                            <option value="Balangir">Balangir</option>
                            <option value="Balasore">Balasore</option>
                            <option value="Bargarh">Bargarh</option>
                            <option value="Bhadrak">Bhadrak</option>
                            <option value="Boudh">Boudh</option>
                            <option value="Cuttack">Cuttack</option>
                            <option value="Deogarh">Deogarh</option>
                            <option value="Dhenkanal">Dhenkanal</option>
                            <option value="Gajapati">Gajapati</option>
                            <option value="Ganjam">Ganjam</option>
                            <option value="Jagatsinghapur">Jagatsinghapur</option>
                            <option value="Jajpur">Jajpur</option>
                            <option value="Jharsuguda">Jharsuguda</option>
                            <option value="Kalahandi">Kalahandi</option>
                            <option value="Kandhamal">Kandhamal</option>
                            <option value="Kendrapara">Kendrapara</option>
                            <option value="Kendujhar">Kendujhar (Keonjhar) </option>
                            <option value="Khordha">Khordha</option>
                            <option value="Koraput">Koraput</option>
                            <option value="Malkangiri">Malkangiri</option>
                            <option value="Mayurbhanj">Mayurbhanj</option>
                            <option value="Nabarangpur">Nabarangpur</option>
                            <option value="Nayagarh">Nayagarh</option>
                            <option value="Nuapada">Nuapada</option>
                            <option value="Puri">Puri</option>
                            <option value="Rayagada">Rayagada</option>
                            <option value="Sambalpur">Sambalpur</option>
                            <option value="Sonepur">Sonepur</option>
                            <option value="Sundargarh">Sundargarh</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <select class="form-control" id="gender" name="gender">
                            <option value="" selected disabled hidden>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="col-auto">
                    <button class="btn btn-outline-primary" type="submit" name="show">Show</button>
                    </div>
                    <div class="col-auto">
                    <button class="btn btn-outline-primary" type="reset">Reset</button>
                    </div>
                </div>
            </form>
            <?php
                 if (isset($_GET['query'])) {
                    $query = $_GET['query'];
                 }
                $query = "SELECT * FROM users ORDER BY id DESC";
                $results = mysqli_query($db, $query);
            ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone No.</th>
                        <th>E-mail</th>
                        <th>Gender</th>
                        <th>District</th>
                        <th>Address</th>
                        <th colspan="2">Action</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                    <?php
                        if( mysqli_num_rows( $results )==0 ){
                            echo '<tr><td colspan="4">No Details Found</td></tr>';
                        }else{
                            while( $row = mysqli_fetch_assoc( $results ) ){?>
                           <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['district']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td>
                                <button class="btn btn-outline-primary" type="button" data-toggle="modal" href="#addDetails"><i class="fa fa-edit"></i></button>
                                </td>
                                <td>
                                <button class="btn btn-outline-danger" type="button" data-toggle="modal" href="#deleteDetails"><i class="fa fa-trash"></i></button>
                                </div></td>
                            </tr>
                        <?php }
                        } ?>
                        
                </tbody>
            </table>
            </div>
            <!-- delete details Modal -->
            <div class="modal fade" id="deleteDetails" tabindex="-1" role="dialog" aria-labelledby="deleteDetailsTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteDetailsTitle">Do You Really Want To Delete ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning">YES</button>
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">NO</button>
                </div>
                </div>
            </div>
            </div>

        </div>
    </div>

    <!--<script>
        document.getElementById("form-row").onsubmit = function(e) {
            e.preventDefault();
            const dist = documnet.getElementById("dist").value;
            const gender = documnet.getElementById("gender").value

            const req = new XMLHttpRequest()
            req.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    const data = this.response;
                    const str = "";
                    data.forEach(rec => {
                        str += `<td>${rec.name}</td>
                                <td>${rec.phone}</td>`
                    })


                }
            }
        }

    </script>-->
</body>
</html>