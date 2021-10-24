pipeline{
    agent{
         node {
            label 'master'
            customWorkspace "workspace/${env.BRANCH_NAME}/src/github.com/hafid29/SeGeCa_backend/"
        }
    }
    environment {
        SERVICE  = "backend-segeca"
        NOTIFDEPLOY = -1001516287679
    }
    options {
        buildDiscarder(logRotator(daysToKeepStr: env.BRANCH_NAME == 'main' ? '90' : '30'))
    }
    stages{
        stage("Checkout"){
            when {
                anyOf { branch 'main'; branch 'develop'; branch 'staging' }
            }
            // Do clone
            steps {
                echo 'Checking out from git'
                checkout scm
            }
        }
        stage('Build and deploy') {
            environment {
                GOPATH = "${env.JENKINS_HOME}/workspace/${env.BRANCH_NAME}"
                PATH = "${env.GOPATH}/bin:${env.PATH}"
            }
            stages {
                // build to dev
                stage('Deploy to env development') {
                    when {
                        branch 'develop'
                    }
                    environment {
                        NAMESPACE = 'bandung-bondowoso-dev'
                    }
                    steps {
                        // get credential file
                        sh 'ls'
                        echo 'Build image'
                        sh 'chmod +x build.sh'
                        sh './build.sh default'
                    }
                }
            }
        }
    }
    post{
        success{
            telegramSend(message:"Application $SERVICE has been [deployed]",chatId:"$NOTIFDEPLOY")
        }
        failure{
            telegramSend(message:"Application $SERVICE has been [Failed]",chatId:"$NOTIFDEPLOY")
        }
    }
}