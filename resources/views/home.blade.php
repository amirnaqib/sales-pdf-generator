<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sales To PDF</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert2.css">
</head>
<body>
    <div class="row" style="justify-content: center;">
            <div class="registration-form">
                <form>
                    <div class="form-group">
                        <label>Property Address :</label>
                        <textarea class="form-control item" aria-label="With textarea" id="paddress" placeholder="enter property address"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Sale / Lease Price :</label>
                        <input type="text" class="form-control item" id="price" placeholder="enter sale / lease price">
                    </div>
                    <br>
                    <div class="row" style="justify-content: end;">
                        <button type="button" class="btn btn-danger">Reset</button> &nbsp;
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSalesPersonModal" >+ Salespersons</button>
                    </div>
                    <br>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Salespersons</th>
                            <th scope="col">Percentage</th>
                            <th scope="col">Commission</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Leman Teben</td>
                            <td>2%</td>
                            <td>20,000</td>
                            <td>
                                <button type="button" class="btn btn-danger">-</button>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Yakob Jacob</td>
                            <td>5%</td>
                            <td>10,000</td>
                            <td>
                                <button type="button" class="btn btn-danger">-</button>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Larry Utoh</td>
                            <td>15%</td>
                            <td>12,000</td>
                            <td>
                                <button type="button" class="btn btn-danger">-</button>
                            </td>
                          </tr>
                        </tbody>
                    </table>
                    <br>
                    <div class="form-group">
                        <button onclick="onGeneratePDF()" type="button" class="btn btn-block create-account">Generate PDF</button>
                    </div>
                    <br>
                </form>
                <div class="social-media">
                </div>
            </div>
            &nbsp;&nbsp;
            <div class="registration-form">
                <form>
                    <div class="">
                        <span>History Log :</i></span>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Salespersons</th>
                            <th scope="col">Percentage</th>
                            <th scope="col">Commission</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Leman Teben</td>
                            <td>2%</td>
                            <td>20,000</td>
                            <td>
                                <button type="button" class="btn btn-danger">-</button>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Yakob Jacob</td>
                            <td>5%</td>
                            <td>10,000</td>
                            <td>
                                <button type="button" class="btn btn-danger">-</button>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Larry Utoh</td>
                            <td>15%</td>
                            <td>12,000</td>
                            <td>
                                <button type="button" class="btn btn-danger">-</button>
                            </td>
                          </tr>
                        </tbody>
                    </table>
                </form>
                
                <div class="social-media">
                    <h5>Oops, thats all</h5>
                </div>
            </div>
    </div>

    {{-- modal section --}}
    <div class="modal fade" id="addSalesPersonModal" tabindex="-1" role="dialog" aria-labelledby="addSalesPersonModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addSalesPersonModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/plugin/sweet-alert/sweetalert2.all.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
