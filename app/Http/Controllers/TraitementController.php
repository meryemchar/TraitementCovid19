<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Choice;
use App\Answer;
use App\Region;
use App\Docteur;
use Validator;
use Flashy;
use App\Charts\SampleChart;

class TraitementController extends Controller
{
    public function nontraite(){
    	$users=User::where('form',1)->where('treatment',0)->paginate(5);
    return view('/demande',compact('users'));
    //return response(compact('demandes'));
}
 public function traite(){
      $users=User::where('form',1)->where('treatment',1)->paginate(5);
    return view('/archive',compact('users'));
    //return response(compact('demandes'));
}
public function fetch_data(Request $request){
           if($request->ajax()){
           $users=User::where('form',1)->where('treatment',0)->paginate(5);
    	
                return view('pagination',compact('users'))->render();
           }
    }
    public function fetch_data_traite(Request $request){
           if($request->ajax()){
           $users=User::where('form',1)->where('treatment',1)->paginate(5);
      
                return view('paginationarchive',compact('users'))->render();
           }
    }

    public function info(Request $request){
      if($request->ajax()){
           $questions=Question::pluck('text_qst');
           $choicesText=Choice::pluck('text_choice');
          
        $answers=Answer::where('id_user',$request->id)->get();//toute la table
    
        $result=array();
       
          for ($y = 1; $y < 5; $y++){
          
           $n=$answers[$y-1]->answer;
            $result[]=array(
               'text_qst' => $questions[$y-1],
              
               'choice' => $choicesText[$n-1]
            );
              }
               $result[]=array(
               'text_qst' => $questions[4],
                'choice' => $answers[4]->answer
            );
          return response($result);
      }}

/*
 public function info(Request $request){
        if($request->ajax()){
             $questions=Question::all();
          $answers=Answer::where('id_user',$request->id)->get();
       $size=count($answers);
          $result=array();
           $z=1;
            for ($y = 1; $y < 5; $y++){
             $choices=Choice::where('id_qst',$y)->get();
             $n=$answers[$y-1]->answer;
              $result[]=array(
                 'text_qst' => $questions[$y-1]->text_qst,
                  'choice' => $choices[$n-1]->text_choice
              );
                }
                 $result[]=array(
                 'text_qst' => $questions[4]->text_qst,
                  'choice' => $answers[4]->answer
              );
            return response($result);
        }
    }
    */
/*
    public function result(Request $request){
        if($request->ajax()){
             $questions=Question::all();
          $answers=Answer::where('id_user',$request->id)->get();
       $size=count($answers);
          $result=array();
           $z=1;
            for ($y = 1; $y < 5; $y++){
             $choices=Choice::where('id_qst',$y)->get();
             $n=$answers[$y-1]->answer;
              $result[]=array(
                 'text_qst' => $questions[$y-1]->text_qst,
                  'choice' => $choices[$n-1]->text_choice
              );
                }
                 $result[]=array(
                 'text_qst' => $questions[4]->text_qst,
                  'choice' => $answers[4]->answer
              );
                 $user=User::where('id_user',$request->id)->first();
                 $r=$user->result;
                 $result[]=array(
                 'text_qst' => $questions[4]->text_qst,
                  'choice' => $answers[4]->answer,
                  'res'=>$r
              );
            return response($result);
        }
    }
*/

public function result(Request $request){
   if($request->ajax()){
       $questions=Question::pluck('text_qst');
        $choicesText=Choice::pluck('text_choice');
       
     $answers=Answer::where('id_user',$request->id)->get();//toute la table
 
     $result=array();
    
       for ($y = 1; $y < 5; $y++){
           $n=$answers[$y-1]->answer;
         $result[]=array(
            'text_qst' => $questions[$y-1],               
            'choice' => $choicesText[$n]
         );
           }
            $result[]=array(
            'text_qst' => $questions[4],
             'choice' => $answers[4]->answer
         );
            $user=User::where('id_user',$request->id)->first();
            $r=$user->result;
            $result[]=array(
            'text_qst' => $questions[4],
             'choice' => $answers[4]->answer,
             'res'=>$r
         );
       return response($result);
   }
}

     public function update(Request $request)
    {
    if($request->ajax()){
          $validation=Validator::make($request->all(),['result'=>'required']);
                                if($validation->fails()){
                                    return response(['message'=>'error']);
                                }else{
            $user=User::where('id_user',$request->id)->first();
              $user->treatment=1;
              $user->save();
            if($request->result==1){
               $user->result='Negative';
               $user->save();
            }else if($request->resultat==0){
                      $user->result='Positive';
                      $user->save();
                          $region=Region::find($user->id_region);
                          $region->nbr_positive++;
                          $region->save();
            }
            $user->save();
            $users=User::where('form',1)->where('treatment',0)->get();
            $result=array();
             $result[]=array(
                 'id' => $request->id,
                  'nombre' =>Count($users) 
              );

             return response($result);
            }
      }
      
    }
      public function changer(Request $request){
         if($request->ajax()){
           $validate=Validator::make($request->all(),['ancien'=>'required',
            'pass'=>'required|min:8','repet'=>'required|same:pass'],['ancien.required'=>'*','pass.required'=>'*','repet.required'=>'*','pass.min'=>'+','repet.same'=>'+']);
         if($validate->fails()){
               return response($validate->errors());
         }
         $user=Docteur::where('id_docteur',$request->id)->first();
         $pass=$user->password;
         if($request->ancien!=$pass){
              return response('error');
         }else{
          $user->password=$request->pass;
          $user->save();
           return response('success');
         
         }
}
        
                              
      }
       public function auto(Request $request){
        $term=$request->get('term');
        $users=User::where('firstname','like','%'.$term.'%')->orwhere('lastname','like','%'.$term.'%')->get()->take(10);
        $result=array();
        foreach($users as $user){
          if($user->treatment==0){
             array_push($result,$user['firstname'].' '.$user['lastname']);
          }
           
          }
        
       return response()->json($result);
    }
       public function auto_t(Request $request){
        $term=$request->get('term');
        $users=User::where('firstname','like','%'.$term.'%')->orwhere('lastname','like','%'.$term.'%')->get()->take(10);
        $result=array();
        foreach($users as $user){
           if($user->treatment==1){
             array_push($result,$user['firstname'].' '.$user['lastname']);
           }
           
        }
       return response()->json($result);
    }



      public function connexion(Request $request){
         $this->validate($request,['login'=>'required|min:4',
        'password'=>'required|min:8']);
       
         $user=Docteur::where('login',$request->login)->first();
         if(!isset($user)){
            
               Flashy::error('Utilisateur introuvable!');
               return redirect('login');

         }else{
            if($user->password==$request->password){
              $result[]=array(
                 'message' => 1
              );
     
              session()->put('connecte',0);
              session()->put('username',$user->login);
              session()->put('id',$user->id_docteur);
              Flashy::success('Bienvenue '.$user->login);
                return redirect('/');
            }else{
            
                  Flashy::error('Informations Incorrectes !');
               return redirect('login');
            }
            
         }
       }

     
 public function logout(){
      session()->put('connecte',1);

 Flashy::info('À très bientôt !');
    return redirect('login');
 }


  public function search(Request $request){
          if($request->ajax()){
                $validation=Validator::make($request->all(),['search'=>'required']);
                            if($validation->fails()){
                                Flashy::error('Veuillez remplir le champs de recherche!');
                                return response(['message'=>'error']);
                            }else{
                              $result='';
                 $users=User::where('treatment','0')->get();
                 foreach($users as $user){
                        $name=$user->firstname.' '.$user->lastname;
                        if($name==$request->search){
                           $result=$user;
                        }
                 }
                 if($result==''){
                      Flashy::error('Citoyen introuvable !');
                 }
               return response($result);
                }

         }
    }
    public function search_traite(Request $request){
          if($request->ajax()){
                $validation=Validator::make($request->all(),['search'=>'required']);
                            if($validation->fails()){
                                Flashy::error('Veuillez remplir le champs de recherche!');
                                return response(['message'=>'error']);
                            }else{
                              $result='';
                 $users=User::where('treatment','1')->get();
                 foreach($users as $user){
                        $name=$user->firstname.' '.$user->lastname;
                        if($name==$request->search){
                           $result=$user;
                        }
                 }
                 if($result==''){
                      Flashy::error('Citoyen introuvable !');
                 }
               return response($result);
                }

         }
    }

    public function graph()
    {
        
        $region=Region::pluck('nbr_positive','text_region');

        $chart= new SampleChart;

        //$chart->labels(['Jan', 'Feb', 'Mar']);
        $chart->labels($region->keys());
        //$chart->dataset('cas positif', 'bar', [10, 25, 13]);
        $chart->dataset('cas positif', 'bar', $region->values()) ->options//;
        ([
            'backgroundColor'=>'rgba(54,162,192,1)',
            'borderColor'=>'rgba(54,162,192,0.8)',
            'hoverBorderWidth'=>4,
            'hoverBorderColor'=>'rgba(0,50,100,0.8)'  ,
            'hoverBackgroundColor'=>'rgba(30,195,170,1)'       
        ]);

        

        $chart->options([
            'title'=>
            ['display'=>true,
            'text'=> 'Propagation du corona virus dans les regions du maroc',
            'fontSize'=>20,
            'fontFamily'=>'ArialBlack'
            ] ,
            'legend'=>
            [
                'position'=>'right'
            ] 
           
        ],
        );
       
        return view("tableau",compact('chart'));

    }
    
    
}
