
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
     <a class="navbar-brand" href="#"><?php include('logo.php') ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="users_reviews.php">Users</a>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Literature
               </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="minds.php">Minds</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="read_list.php">Reading List</a>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="quotes.php">Quotes</a>
          </li>
          <li class="hidden">----</li>
            <?php
            if($_COOKIE['user'] == 'lenashukova'):?>
                <li class="nav-item">
                    <a class="nav-link"  href="admin.php" tabindex="-1">Add book</a>
                </li>



            <?php endif; ?>
          
              <?php 
                  if($_COOKIE['user'] == ''):?>   
                        <li class="nav-item">
                          <a class="nav-link"  href="#" tabindex="-1"  data-bs-toggle="modal" data-bs-target="#signmod" >Sign In</a>
                        </li>
                        <li class="nav-item">
                        
                          <a class="nav-link"  href="#" tabindex="-1"  data-bs-toggle="modal" data-bs-target="#regmod" >Sign Up</a>
                        </li>
                       
                  
                <?php endif; ?>
                <?php 
                  if(!($_COOKIE['user'] == '')):?>   
                          <li class="nav-item">
                          <div style="margin-bottom : 10px;">
                          <form action="" method="post">
                              <input type="submit" class="btn btn-dark" name="signout" value="Sign Out" >
                          </form>
                          </div>
                          </li>
                       
                  
                <?php endif; ?>
           
            <?php 
                  if(isset($_POST['signout'])) {
                    setcookie('user', '', time()-3600, '/');
                  }             
           ?>
       
    </ul>
  
  </div>
</nav>    


<!-- Modal -->
<div class="modal fade" id="signmod" tabindex="-1" aria-labelledby="modlb" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modlb">Authorisation<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-brightness-low" viewBox="0 0 16 16">
  <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707zM3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707z"/>
</svg></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="check_auth.php" method="post">
        <div class="mb-3">
          <label for="logauth" class="form-label">Login</label>
          <input type="text" class="form-control" id="logauth" name="logauth" placeholder="Login">
        </div>
        <div class="mb-3">
          <label for="passauth" class="form-label">Password</label>
          <input type="password" class="form-control" id="passauth" name="passauth" placeholder="Пароль">
        </div>
       
      </div>
      <div class="modal-footer">
        
      <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="do_login" class="btn btn-dark">Sign In</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="regmod" tabindex="-1" aria-labelledby="modlb" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modlb">Registration<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-brightness-low" viewBox="0 0 16 16">
  <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm.5-9.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707zM3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707z"/>
</svg></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="check_reg.php" method="post">
      <div class="mb-3">
          <label for="namereg" class="form-label">Name</label>
          <input type="text" class="form-control" id="namereg" name="namereg" placeholder="Имя">
        </div>
    
        <div class="mb-3">
          <label for="logreg" class="form-label">Login</label>
          <input type="text" class="form-control" id="logreg" name="logreg" placeholder="Login">
        </div>
        <div class="mb-3">
          <label for="passreg" class="form-label">Password</label>
          <input type="password" class="form-control" id="passreg" name="passreg" placeholder="Пароль">
        </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal" >Close</button>
        <button type="submit" name="do_reg" class="btn btn-dark">Sign Up</button> 
      </div>
      </form>
    </div>
  </div>
</div>
 
