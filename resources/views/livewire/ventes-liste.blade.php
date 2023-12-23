<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Journal de Board Ventes</h3>

          <div class="card-tools">
           17/12/2023
          </div>          
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 450px;">
            <table class="table table-striped table-bordered text-nowrap">
              <thead class="thead-dark">
                <tr>
                  <th rowspan="2">DATE</th>
                  <th colspan="2">VENTES ESSENCES</th>
                  <th colspan="2">VENTES GAZOIL</th>
                  <th rowspan="2">VENTES TOTALES</th>
                </tr>
                <tr>
                  <th>Qte litre</th>
                  <th>Montant</th>
                  <th>Qte litre</th>
                  <th>Montant</th>
                </tr>
              </thead>
              <tbody>
                @for ($i=0; $i<4; $i++ )
                <tr>
                  <td><a href="{{route('vente.show')}}">12-7-2023</a></td>
                  <td>100</td>
                  <td>85.000 FCFA</td>
                  <td>100</td>
                  <td>65.000 FCFA</td>
                  <td>150.000 FCFA</td>
                </tr>
                @endfor
              </tbody>
            </table>
          </div>
          
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>