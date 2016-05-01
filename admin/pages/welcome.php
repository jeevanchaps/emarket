
            <div class="main">
            <?php 
                    if(isset($_SESSION['username']))
                    {
                        $admin=$_SESSION['username'];
                    }
                    else
                    {
                        $admin="";
                    }
                ?>
                <h1 class="title">Welcome Admin</h1>
                <p>
                    "Welcome <strong><?php echo strtoupper($admin); ?></strong> to the admin panel of Rural Emarket. With advanced features of manageing 
                    website contents, accounts and new login widgets, you will definitely have a great experience 
                    of using this admin panel for managing your website dynamically."
                </p>
                
            </div>          