<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sales To PDF</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert2.css">
    <!-- Load jQuery first, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                    <button type="button" class="btn btn-danger" onclick="onReset()">Reset</button> &nbsp;
                    <button type="button" class="btn btn-success" onclick="openAddModal()" >+ Salespersons</button>
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
            </div>
        </div>
    </div>

    {{-- modal section --}}
    {{-- modal section --}}
    <div class="modal" id="addSalesPersonModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Salesperson</h4>
            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> --}}
          </div>
    
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-7">
                  <div class="form-group">
                      <label>Salesperson :</label>
                      <input type="text" class="form-control item" id="price" placeholder="enter salesperson name">
                  </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label>Percentage(%) :</label>
                  <input type="text" class="form-control item" id="price" placeholder="enter percentage">
              </div>
              </div>
              <div class="col-2">
                <label>&nbsp;</label><br>
                <button type="button" class="btn btn-danger" onclick="deleteSalesPersonRow()">-</button>
              </div>
            </div>
            <div class="row" style="justify-content: center;">
              <button type="button" class="btn btn-success">+ Add Salesperson</button>
            </div>
          </div>
    
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
    
        </div>
      </div>
    </div>

    <!-- Removed duplicate jQuery and added scripts in correct order -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/plugin/sweet-alert/sweetalert2.all.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
