Laravel Two Factor Authentication  package

After Laravel project installation 

Add the code in composer.json file 
1.first create a root folder on directory snayvik_tech_labs.
2. git clone from the repo with this command  git clone https://github.com/mayanksnyvik/two-factor-auth.git
3. Add this code in requre section "mayanksnyvik/two-factor-auth": "1.0" 
4. Add this code after script section 
  "repositories":[
        {
           "type":"path",
            "url":"mayanksnyvik/two-factor-auth",
            "options":{
                "symlink":true
            }
        }
            
    ],

5. Run composer update command
6. Install Laravel ui/auth
7. Run command php artisan migrate
8. Update mail configuration in your .env file    
