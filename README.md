Laravel Two Factor Authentication  package

After Laravel project installation 

Add the code in composer.json file 
1. git clone from the repo with this command  git clone https://github.com/mayanksnyvik/two-factor-auth.git
1. Add this code in requre section "mayanksnyvik/two-factor-auth": "1.0" 
2. Add this code after script section 
  "repositories":[
        {
           "type":"path",
            "url":"mayanksnyvik/two-factor-auth",
            "options":{
                "symlink":true
            }
        }
            
    ],

3. Run composer update command
4. Install Laravel ui/auth
5. Run command php artisan migrate
6. Update mail configuration in your .env file    
