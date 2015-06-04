<?php
class Auth extends CI_Controller
{
  public function session($provider)
  {
    $this->load->helper('url_helper');

    $this->load->spark('oauth2/0.3.1');

    $provider = $this->oauth2->provider($provider, array(
      'id' => '1046919449205-7v1ta3df46jdr8lf2gshqaalmvs958qk.apps.googleusercontent.com',
      'secret' => 'DLdYqajedDgCrvqSKmIHZjAB',
    ));

    if ( ! $this->input->get('code'))
    {
      // By sending no options it'll come back here
      $provider->authorize();
    }
    else
    {
      // Howzit?
      try
      {
        $token = $provider->access($_GET['code']);

        $userInfo = $provider->get_user_info($token);
        $this->load->model('User','',TRUE);
        $userModel = $this->User;
        /* @var $user User */
        $user = $userModel->getUserByEmail($userInfo["email"]);
        if(!$user){
            $userModel->save(null, array(
              "first_name" => $userInfo["first_name"],
              "last_name" => $userInfo["last_name"],
              "email" => $userInfo["email"],
              "avatar" => $userInfo["image"]
            ));
        }
        $this->login($user);
        redirect("http://localhost/feed");
        // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
        // If you store it all in a cookie and redirect to a registration page this is crazy-simple.
//        echo "<pre>Tokens: ";
//        var_dump($token);
//
//        echo "\n\nUser Info: ";
//        var_dump($user);
      }

      catch (OAuth2_Exception $e)
      {
        show_error('That didnt work: '.$e);
      }

    }
  }

  function login($user)
  {
    //query the database
    if($user)
    {
      $sess_array = array();
      foreach($user as $row)
      {
        $sess_array = array(
          'id' => $row->id,
          'first_name' => $row->first_name,
          'last_name' => $row->last_name,
          'avatar' => $row->avatar,
        );
        $this->session->set_userdata('logged_in', $sess_array);
      }
      return TRUE;
    }
  }
}