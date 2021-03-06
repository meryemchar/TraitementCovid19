@extends('default',['titre'=>'Fiches traités'])

@section('content')
   @if($users->count()!=0)
       
                  <div class="row">
            <div class="col-md-12 main-datatable">
                <div class="card_body">
                    <div class="row d-flex">
                         <div class="col-sm-6 createSegment"> 
                        <h3>Liste des fiches d'investigation traités</h3>
                        </div>
                        <div class="col-sm-6 add_flex">
                              <form method="POST" id="form-search2" action="{{URL::to('search_traite')}}" class="form-group searchInput">
                                <label for="name">Recherche:</label>
                                <input type="search" name="search" class="form-control" id="search_t" placeholder="">
                              </form>
                            </div>
                        </div> 
                    </div>
                    <div class="overflow-x" id="table_data">
                      <br/><br/>
                   @include('paginationarchive') 
          
            @else
 <div class="row" id="contenu" >

             <div class="col-md-2"></div>
              <div class="col-md-8">
                  <br/>
              <div class="card mb-4 shadow-sm" style="height:550px">
                
                  <img class="card-img-top" alt="Card image cap"  src="images/demande2.svg" style="width: 150px;height:350px;margin:auto;">
                       <div class="color-default-700 -fs-22 -b -pbxl" style="font-size: 30px;font-weight:bold;color:gray;opacity:0.8;margin:auto;margin-top:-70px;">Aucune demande !</div>
               <div class="col-xs-4 " style=" margin-left: 17px;">
             
            <br><br>
        </div>
                  </div>
          </div>

 @endif
             
        </div>
    </div>

            


@endsection