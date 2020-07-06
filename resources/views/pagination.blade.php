                        <table style="width:100%;" id="table" class="table cust-datatable dataTable no-footer">
                            <thead>
                                <tr>
                                    <th style="min-width:50px;">ID</th>
                                    <th style="min-width:150px;">Citoyen</th>
                                      <th style="min-width:150px;">Demande</th>
                                  <!--  <th style="min-width:200px;">Date</th>-->
                                  <th style="min-width:0px;"></th>
                                </tr>
                            </thead>
                    {{csrf_field()}}
                   @foreach($users as $user)
                   <tr id="{{$user->id_user}}" >
                    <td>{{$user->id_user}}</td>
                          <td >{{$user->firstname.' '.$user->lastname}}</td>
                                <td><button name="view" value="Détails"  id="edit" class="mode mode_on" data-id="{{$user->id_user}}"/>Détails</button></td>
                                <td></td>
                     </tr>
                     @endforeach
                             
                            </tbody>
                        </table>
                        <div style="margin-top:30px;margin-left:1000px;" id="link">{{$users->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
       
              <div id="retour"></div>
 
          
