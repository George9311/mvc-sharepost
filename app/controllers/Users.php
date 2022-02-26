<?php
class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }
  public function index()
  {
  }

  public function register()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // insert data form
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'gen' => trim($_POST['gen']),
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Valid email
      if (empty($data['email'])) {
        $data['email_err'] = "Please enter email!";
      } else {
        // Check email
        if ($this->userModel->findUserByEmail($data['email'])) {
          $data['email_err'] = "Email is already taken";
        }
      }

      if (empty($data['name'])) {
        $data['name_err'] = "Please enter Name";
      }
      // valid password
      if (empty($data['password'])) {
        $data['password_err'] = "Please enter password";
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = "Password must be at least 6 characters";
      }
      // validate password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = "Please confirm password";
      } else {
        if ($data['password'] != $data['confirm_password']) {

          $data['confirm_password_err'] = "Password do not match";
        }
      }

      // make sure errors a empty
      if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
        // validate 
        //hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register user
        if ($this->userModel->register($data)) {
          flash('register_success', 'You are registered and can login');
          redirect('users/login');
        } else {
          die('Something whent wrong');
        }
      } else {
        // Load view with errors
        $this->view('users/register', $data);
      }
    } else {
      // Init data
      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
        'gen' => ''
      ];

      // Load view
      $this->view('users/register', $data);
    }
  }

  public function login()
  {

    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [

        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
      ];
      // Valid email
      if (empty($data['email'])) {
        $data['email_err'] = "Please enter email!";
      }

      if (empty($data['password'])) {
        $data['password_err'] = "Please enter password!!";
      }

      //Check for user/email
      if ($this->userModel->findUserByEmail($data['email'])) {
        // user found 

      } else {
        $data['email_err'] = 'No user found';
      }

      // Make sure errors a empty
      if (empty($data['email_err']) && empty($data['password_err'])) {
        // validate 
        // Check and set logger in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);

        if ($loggedInUser) {
          // Create session
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_err'] = 'Password incorect';
          $this->view('users/login', $data);
        }
      } else {
        // Load view with errors
        $this->view('users/login', $data);
      }
    } else {
      // Init data
      $data = [

        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => ''

      ];

      // Load view
      $this->view('users/login', $data);
    }
  }


  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_name'] = $user->name;
    redirect('posts');
  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy();
    redirect('users/login');
  }
  // Find user by email
  public function findUserByEmail($email)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    // Bind value
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Get User by ID
  public function getUsersById($id)
  {
    $this->db->query('SELECT * FROM users WHERE id = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }
}
