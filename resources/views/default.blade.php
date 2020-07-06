<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link href="/css/all.min.css" rel="stylesheet" />
        <link href="/css/fontawesome.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="/css/AdminLTE.min.css">
       <!-- <link rel="stylesheet" href="/css/skins/_all-skins.min.css"> -->
       
        <link rel="stylesheet" href="/css/ionicons.min.css">
         <link rel="stylesheet" href="/css/style.css">
        <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet'>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
                <title>COVID-19-{{$titre}}</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>       

</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<!--<script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous">
    </script>-->

        <style>
        .mydiv{   
            
            height:70%;
              }
    </style>


    </head>
    <body>
 
@if(session()->get('connecte')!=0)
  <script type="text/javascript">window.location="/login";</script>
@endif


<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="hamburger__inner">
         <div class="one"></div>
         <div class="two"></div>
         <div class="three"></div>
       </div>
    </div>
    <div class="menu">
      <div class="logo">
                <img src="images/covid.jpg" alt="logo_pic" width="50" heigh="50">
                COVID-19
      </div>
      <div class="right_menu">
        <ul>
          <li><i class="fas fa-user"></i>
            <div class="profile_dd">
               <div class="dd_item" ><a href="#" style="color:#004D40;font-size:12px;" id="#changemdp">Changer le mot de passe</a></div>
               <div class="dd_item"><a href="{{URL::to('/logout')}}" style="color:#004D40;font-size:12px;">Déconnexion</a></div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="main_container">
      <div class="sidebar">
          <div class="sidebar__inner">
            <div class="profile">
              <div class="img">
                <img src="images/docteur.jpg" alt="profile_pic">
              </div>
              <div class="profile_info">
                 <p>Bienvenue</p>
                 <p class="profile_name">{{session()->get('username')}}</p>
              </div>
            </div>
            <ul>
              <li>
                <a href="{{URL::to('/')}}" class="active">
                  <span class="icon"><i class="fas fa-dice-d6"></i></span>
                  <span class="title">Tableau de bord</span>
                </a>
              </li>
              <li>
                <a href="{{URL::to('/demande')}}" id="demande">
                  <span class="icon"><i class="fas fa-list-alt"></i></span>
                  <span class="title">Demandes</span>
                </a>
              </li>
              <li>
                <a href="{{URL::to('/archive')}}">
                  <span class="icon"><i class="fas fa-file-archive"></i></span>
                  <span class="title">Archive</span>
                </a>
              </li>
              <li>
                  <br/><br/><br/><br/>
              </li>
              <li>
             <br/><br/><br/><br/>
             <br/><br/><br/><br/>
                <br/><br/><br/><br/>
             <br/><br/><br/><br/>
              </li>
            </ul>
          </div>
      </div>
      <div class="container">
      <div class="content" style="width:1150px;">
      <div class="row" style="margin-top:;">
            <!-- <div class="box col-xs-12 col-sm-10 col-md-10" style="">
            -->
            <div class="box col-xs-12 col-sm-10 col-md-10" style="">
                 @yield('content')
            </div>     
            </div>
            </div>
            </div>

<!--modal demande-->
 <div id="modal_reponse" class="modal fade Mdl" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="width:850px;margin-left:-120px;">
            <div class="modal-header">
                 <h2 class="col-sm-12 modal-title" style="text-align: center;margin-top: 0!important; font-weight: 400;color:#333333;">Demande</h2>
                 <button type="button" class="close" data-dismiss="modal" style="margin-left:-50px;">&times;</button>
            </div>
            <div class="modal-body">
                    <span id="form_result"></span>
                       <div class="col-xs-6 col-sm-4"><br><p style="margin-left:5px;background-color: Gainsboro;opacity:0.7;font-size: 14px;border-radius:3px;" id="titl"></div>       
                 <form name="form-user" method="POST" id="form-modifier" action="{{URL::to('update')}}">
                  <div class="box-body b">
                     <div class="row">
                       <div class="col-sm-12">
                         {{csrf_field()}}
                         <input id="id" name="id" class="form-control" type="hidden" placeholder=""
                         type="text" value="">
                        <label style="font-weight: bold" id="question1"></label>
                      <div class="form-group mb-30">
                        <input id="answer1" name="answer1" class="form-control" placeholder=""
                         type="text" value="" required>
                      </div>
                    </div>
                     <div class="col-sm-12">
                        <label style="font-weight: bold" id="question2"></label>
                      <div class="form-group mb-30">
                        <input id="answer2" name="answer2" class="form-control" placeholder=""
                         type="text" value="" required>
                      </div>
                    </div>
                        <div class="col-sm-12">
                             <label style="font-weight: bold" id="question3"></label>
                          <div class="form-group mb-30">
                            <input id="answer3" name="answer3" class="form-control" placeholder=""
                             type="text" value="" required >

                          </div>
                        </div>
                        <div class="col-sm-12">
                             <label style="font-weight: bold" id="question4"></label>
                                      <div class="form-group mb-30">
                                        <input id="answer4" name="answer4" class="form-control" value="" placeholder="" type="text" required>
                                      </div>
                                    </div>
                                      <div class="col-sm-12">
                             <label style="font-weight: bold" id="question5"></label>
                                      <div class="form-group mb-30">
                                        <input id="answer5" name="answer5" class="form-control" value="" placeholder="" type="text" required>
                                      </div>
                                    </div>
                      </div>
                      <div class="col-sm-12">
                           <label style="font-weight: bold">Résultat du test:   <span style="font-size: 20px;color:red;margin-left:15px;">*</span></label>
                           <table>
                             <tr>
                               <td>
                                  <div class="form-group mb-30" style="margin-left:-13px;width:250px;">
                                        <select class="form-control" name="result" id="result" >      
                                        <option style=" color: gray;opacity:0.7;" value="0" disabled selected hidden id="slt">Choisir</option>                    
                                        <option style=" color: gray;opacity:0.7;" value="1" id="slt">Négatif</option>     
                                     <option style=" color: gray;opacity:0.7;" value="2">Positif</option>   
                                        </select>
                                       
                                      </div>
                               </td>
                               <td><div id="rsltE" style="font-size:12px;color:red;margin-left:15px;"></div></td>
                             </tr>
                           </table>
                           <div id="rsltR"></div>
                                </div>
                </div>
                <div class="modal-footer">

                     <div class="form-group" align="center">
                         <input type="hidden" name="action" id="action" value=""/>
                         <input type="submit" name="action_button" class="btn btn-success" value="Modifier"/>
                     </div>                       
                </div>
                </form>  
        </div>
    </div>
 </div>
</div>

<!--model Resultat-->
 <div id="modal_result" class="modal fade Mdl" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="width:850px;margin-left:-120px;">
            <div class="modal-header">
                 <h2 class="col-sm-12 modal-title" style="text-align: center;margin-top: 0!important; font-weight: 400;color:#333333;">Demande</h2>
                 <button type="button" class="close" data-dismiss="modal" style="margin-left:-50px;">&times;</button>
            </div>
            <div class="modal-body">
                    <span id="form_result"></span>
                       <div class="col-xs-6 col-sm-4"><br><p style="margin-left:5px;background-color: Gainsboro;opacity:0.7;font-size: 14px;border-radius:3px;" id="tl"></div>       
                 <form name="form-user" method="POST" id="form-modifier" action="{{URL::to('update')}}">
                  <div class="box-body b">
                     <div class="row">
                       <div class="col-sm-12">
                         {{csrf_field()}}
                         <input id="id" name="id" class="form-control" type="hidden" placeholder=""
                         type="text" value="">
                        <label style="font-weight: bold" id="qst1"></label>
                      <div class="form-group mb-30">
                        <input id="aswr1" name="aswr1" class="form-control" placeholder=""
                         type="text" value="" required>
                      </div>
                    </div>
                     <div class="col-sm-12">
                        <label style="font-weight: bold" id="qst2"></label>
                      <div class="form-group mb-30">
                        <input id="aswr2" name="aswr2" class="form-control" placeholder=""
                         type="text" value="" required>
                      </div>
                    </div>
                        <div class="col-sm-12">
                             <label style="font-weight: bold" id="qst3"></label>
                          <div class="form-group mb-30">
                            <input id="aswr3" name="aswr3" class="form-control" placeholder=""
                             type="text" value="" required >

                          </div>
                        </div>
                        <div class="col-sm-12">
                             <label style="font-weight: bold" id="qst4"></label>
                                      <div class="form-group mb-30">
                                        <input id="aswr4" name="aswr4" class="form-control" value="" placeholder="" type="text" required>
                                      </div>
                                    </div>
                                      <div class="col-sm-12">
                             <label style="font-weight: bold" id="qst5"></label>
                                      <div class="form-group mb-30">
                                        <input id="aswr5" name="aswr5"class="form-control" value="" placeholder="" type="text" required>
                                      </div>
                                    </div>
                      </div>
                      <div class="col-sm-12">
                           <label style="font-weight: bold">Résultat du test: 
                           <div class="form-group mb-30">
                                        <input id="res" name="res" class="form-control" value="" placeholder="" type="text" required>
                                      </div>
                                </div>
                </div>
                <div class="modal-footer">
                </div>
                </form>  
        </div>
    </div>
 </div>
</div>

<!--modal de changement de mot de passe-->
 <div id="passw" class="modal fade Mdl" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="">
            <div class="modal-header">
                 <h2 class="col-sm-12 modal-title" style="text-align: center;margin-top: 0!important; font-weight: 400;color:#333333;">Changer votre mot de passe</h2>
                 <button type="button" class="close" data-dismiss="modal" style="margin-left:-50px;">&times;</button>
            </div>
            <div class="modal-body">
                    <span id="form_result"></span>
                       <div class="col-xs-6 col-sm-4"><br><p style="margin-left:5px;background-color: Gainsboro;opacity:0.7;font-size: 14px;border-radius:3px;" id="tl"></div>       
                 <form name="form-mdp" method="POST" id="form-mdp" action="{{URL::to('changer')}}">
                  <div class="box-body b">
                     <div class="row">
                
                         {{csrf_field()}}
                         <input id="id" name="id" class="form-control" type="hidden" placeholder=""
                         type="text" value="{{session()->get('id')}}">
                      <table>
                             <tr>
                               <td>
                                  <div class="form-group mb-30" style="width:450px;margin-left:5px;">
                                         <input id="ancien"  type="password" name="ancien" class="form-control" placeholder="Saisir votre ancien mot de passe"
                         type="text" value="">
                                      </div>
                               </td>
                               <td> <span style="font-size: 20px;color:red;margin-left:15px;">*</span></td>
                             </tr>
                           </table>
                         <div id="erreurancien" style="font-size:12px;color:red;margin-left:15px;margin-bottom:15px;"></div>
                 
                     <table>
                             <tr>
                               <td>
                                  <div class="form-group mb-30" style="width:450px;margin-left:5px;">
                                         <input id="pass" name="pass" type="password" class="form-control" placeholder="Saisir le nouveau mot de passe"
                         type="text" value="">
                                      </div>
                               </td>
                               <td> <span style="font-size: 20px;color:red;margin-left:15px;">*</span></td>
                             </tr>
                           </table>
                     <div id="erreurpassword" style="font-size:12px;color:red;margin-left:15px;margin-bottom:15px;"></div><br/>
                          <table>
                             <tr>
                               <td>
                                  <div class="form-group mb-30" style="width:450px;margin-left:5px;">
                                        <input type="password" id="repet" name="repet" class="form-control" placeholder="Répéter le nouveau mot de passe"
                             type="text" value="">
                                       
                                      </div>
                               </td>
                               <td> <span style="font-size: 20px;color:red;margin-left:15px;">*</span></td>
                             </tr>
                           </table>
                         <div id="erreurrepet" style="font-size:12px;color:red;margin-left:15px;margin-bottom:15px;"></div>
                       <br/>
                      </div>

                           <div id="rE" style="font-size:12px;color:red;margin-left:15px;"></div>
                           <div id="rR"></div>
                    
                </div>
                <div class="modal-footer">
                  <div class="row">
                    <button type="button" class="btn btn-default pull-right " name="close" id="close" data-toggle="modal" data-target="#passw" sclass="close" data-dismiss="modal" style="margin-right:10px;">Annuler</button>
                    <button type="submit" class="btn  text-white  btn-success pull-right " name="change" id="change" >Changer</button>
                  </div>
                </div>
                </div>
                </form>  
        </div>
    </div>
 </div>
</div>

 
 <script src="//code.jquery.com/jquery.js"></script>
           @include('flashy::message')
  
    </body>
  <script src="/js/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/adminlte.min.js"></script>
  <script src="/js/jquery.slimscroll.min.js"></script>

 <script type="text/javascript">
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });

$(".hamburger .hamburger__inner").click(function(){
  $(".wrapper").toggleClass("active")
})

$(".top_navbar .fas").click(function(){
   $(".profile_dd").toggleClass("active");

});

$(document).ready(function(){
    $(document).on('click','.pagination a',function(e){
      e.preventDefault();
      var page=$(this).attr('href').split('page=')[1];
      fetch_data(page);
    });
     function fetch_data(page){
             $.ajax({
                  url:"/fetch_data?page="+page,
                  success:function(data){
                      $('#table_data').html(data);
                  }

             })
     }

  });
$(document).ready(function(){
    $(document).on('click','#link2 .pagination a',function(e){
      e.preventDefault();
      var page=$(this).attr('href').split('page=')[1];
      fetch_data(page);
    });
     function fetch_data(page){
             $.ajax({
                  url:"/fetch_data_traite?page="+page,
                  success:function(data){
                      $('#table_data').html(data);
                  }

             })
     }

  });
$(document).ready(function(){
    $(document).on('click','a[id="#changemdp"]',function(e){
      e.preventDefault();
     $('#passw').modal('show');
    });
  });


 $('body').delegate("#table #edit2",'click',function(e){
       var id=$(this).data('id');
      $('#id').val('');
        $('#tl').text("Demande N° :"+id);
        $.post('{{URL::to("result")}}',{id:id},function(data){
              $('#id').val(id);
              $('#qst1').html(data[0].text_qst);
              $('#aswr1').val(data[0].choice);
              $('#qst2').html(data[1].text_qst);
              $('#aswr2').val(data[1].choice);
              $('#qst3').html(data[2].text_qst);
              $('#aswr3').val(data[2].choice);
              $('#qst4').html(data[3].text_qst);
              $('#aswr4').val(data[3].choice);
              $('#qst5').html(data[4].text_qst);
              $('#aswr5').val(data[4].choice);
              $('#res').val(data[5].res);
              $('#modal_result').modal('show');
         })

    });

$('body').delegate("#table #edit",'click',function(e){
       var id=$(this).data('id');
      $('#id').val('');
       $('#rslt').html('');
       $('#result').val(0);
        $('#rsltR').html('');
        $('#titl').text("Demande N° :"+id);
        $.post('{{URL::to("info")}}',{id:id},function(data){
              $('#id').val(id);
              $('#question1').html(data[0].text_qst);
              $('#answer1').val(data[0].choice);
              $('#question2').html(data[1].text_qst);
              $('#answer2').val(data[1].choice);
              $('#question3').html(data[2].text_qst);
              $('#answer3').val(data[2].choice);
              $('#question4').html(data[3].text_qst);
              $('#answer4').val(data[3].choice);
              $('#question5').html(data[4].text_qst);
              $('#answer5').val(data[4].choice);
              $('#modal_reponse').modal('show');
         })

    
    });

$("#form-modifier").on('submit',function(e){
      e.preventDefault();
      var data=$(this).serialize();
      var url=$(this).attr('action');
      var post=$(this).attr('method');
      $.ajax({
            type:post,
            url:url,
            data:data,
            dataTy:'json',
            success:function(data){
              if(data.message=='error'){
                        $('#rsltE').html('Ce champs est obligatoire !');
                         $('#rsltR').html('');
                     }else{
                      console.log(data[0].nombre)
                      $('#rsltE').html('');
                          $('#rsltR').html('<div class="alert alert-success" role="alert" style="opacity:0.85;margin-top: 30px;color: #a94442;background-color: #f2dede;border-color: #ebccd1;padding: 15px;margin-bottom: 15px;border: 1px solid transparent; border-radius:4px;margin-right:20px;margin-left:20px;">Traitement effectué avec succés !</div>');
                          $('#'+data[0].id).remove();
                          if(data[0].nombre==0){
                            $('#table').remove();
                             $('#wrapper').remove();
                            $('#form-search').remove();
                            $('#boxB').append('<div class="row" id="contenu" ><div class="col-md-2"></div><div class="col-md-8"><div class="card mb-4 shadow-sm" style="height:550px"><img class="card-img-top" alt="Card image cap"  src="images/demande2.svg" style="width: 150px;height:350px;margin:auto;"><div class="color-default-700 -fs-22 -b -pbxl" style="font-size: 30px;font-weight:bold;color:gray;opacity:0.8;margin:auto;margin-top:-50px;">Aucune demande !</div><div class="col-xs-4 " style=" margin-left: 17px;"><br><br></div></div></div><div class="col-md-2"></div></div>');
                          }
                     }
              }

                     
      })  
      });

$("#form-mdp").on('submit',function(e){
      e.preventDefault();
      $('#erreurancien').html('');
      $('#erreurpassword').html('');
      $('#erreurrepet').html('');
      $('#rR').html('');
      $('#rE').html('');
      var data=$(this).serialize();
      console.log(data)
      var url=$(this).attr('action');
      console.log(url)
      var post=$(this).attr('method');
      console.log(post)
      $.ajax({
            type:post,
            url:url,
            data:data,
            dataTy:'json',
            success:function(data){
                   console.log(data)
              if(data.ancien=="*"){
                $('#erreurancien').html('Ce champs est obligatoire');
              }
               if(data.pass=="*"){
             $('#erreurpassword').html('Ce champs est obligatoire');
              }else if(data.pass=='+'){
                $('#erreurpassword').html('Le mot de passe doit contenir au moins 8 caractères.');
              }
               if(data.repet=="*"){
                $('#erreurrepet').html('Ce champs est obligatoire');
              }else if(data.repet=='+'){
                  $('#erreurrepet').html('La confirmation du mot de passe ne correspond pas');
              }
              if(data=='error'){
                console.log('ok')
                $('#rR').html('');
                    $('#rE').html('<div class="alert alert-danger" role="alert" style="opacity:0.85;margin-top: 30px;color: #a94442;background-color: #f2dede;border-color: #ebccd1;padding: 15px;margin-bottom: 15px;border: 1px solid transparent; border-radius:4px;margin-right:20px;margin-left:20px;">Mot de passe incorrecte !</div>');
                  }
              if(data=='success'){
                
                  $('#rE').html('');
                          $('#rR').html('<div class="alert alert-success" role="alert" style="opacity:0.85;margin-top: 30px;color: #a94442;background-color: #f2dede;border-color: #ebccd1;padding: 15px;margin-bottom: 15px;border: 1px solid transparent; border-radius:4px;margin-right:20px;margin-left:20px;">Mot de passe a été modifié avec succés !</div>');
              }

                  
                 
              }

                     
      })  
      });

 $(document).ready(function () {
           $('#search').autocomplete({
               source: "{{URL::to('auto')}}"    
           });
       });
  $(document).ready(function () {
           $('#search_t').autocomplete({
               source: "{{URL::to('auto_t')}}"    
           });
       });
 

 $("#form-search").on('submit',function(e){
      e.preventDefault();
     $('#retour').empty();
      var data=$(this).serialize();
      var url=$(this).attr('action');
      var post=$(this).attr('method');
      $.ajax({
            type:post,
            url:url,
            data:data,
            dataTy:'json',
            success:function(data){
              if(data.message=='error'){
                $('#retour').empty();
                 window.location.href='/demande';
              
              }else{
                console.log(data.id_user)
                if(data==''){
                   window.location.href='/demande';
                }else{

                  $('.box').html('<table style="width:100%;" id="table" class="table cust-datatable dataTable no-footer"><thead><tr><th style="min-width:50px;">ID</th><th style="min-width:150px;">Citoyen</th><th style="min-width:150px;">Demande</th><th style="min-width:200px;">Date</th></tr></thead>{{csrf_field()}}<tr id="'+data.id_user+'" ><td>'+data.id_user+'</td><td>'+data.firstname+" "+data.lastname+'</td><td><button name="view" value="Détails"  id="edit" class="mode mode_on" data-id="'+data.id_user+'"/>Détails</button></td><td></td></tr></table><div class=row><div class="col-sm-5 col-md-5"></div><div class="col-sm-7 col-md-7"></div></div><br/><br/><br/><br/><br/><div id="retour"></div>');
                       $('#retour').html('<a style="margin-left:15px;font-size:25px;" href="'+'{{URL::to("/demande")}}'+'"><i class="fas fa-chevron-circle-left" style="color:red;"></i>&nbsp;Retour</a>');

                   
                }
              

              }
            }
    })
    });
 $("#form-search2").on('submit',function(e){
      e.preventDefault();
     $('#retour').empty();
      var data=$(this).serialize();
      var url=$(this).attr('action');
      var post=$(this).attr('method');
      $.ajax({
            type:post,
            url:url,
            data:data,
            dataTy:'json',
            success:function(data){
              if(data.message=='error'){
                $('#retour').empty();
                 window.location.href='/archive';
              
              }else{
                console.log(data.id_user)
                if(data==''){
                   window.location.href='/archive';
                }else{

                   $('.box').html('<table style="width:100%;" id="table" class="table cust-datatable dataTable no-footer"><thead><tr><th style="min-width:50px;">ID</th><th style="min-width:150px;">Citoyen</th><th style="min-width:150px;">Demande</th><th style="min-width:200px;">Date</th></tr></thead>{{csrf_field()}}<tr id="'+data.id_user+'" ><td>'+data.id_user+'</td><td>'+data.firstname+" "+data.lastname+'</td><td><button name="view" value="Détails"  id="edit2" class="mode mode_on" data-id="'+data.id_user+'"/>Détails</button></td><td></td></tr></table><div class=row><div class="col-sm-5 col-md-5"></div><div class="col-sm-7 col-md-7"></div></div><br/><br/><br/><br/><br/><div id="retour"></div>');
                       $('#retour').html('<a style="margin-left:15px;font-size:25px;" href="'+'{{URL::to("/demande")}}'+'"><i class="fas fa-chevron-circle-left" style="color:red;"></i>&nbsp;Retour</a>');

                }
              

              }
            }
    })
    });

    </script>

</html>
