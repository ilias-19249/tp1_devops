pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                sh 'docker-compose build'
            }
        }

        stage('Run') {
            steps {
                sh 'docker-compose down -v'
                sh 'docker-compose up -d'
            }
        }

        stage('Test') {
            steps {
                sh 'curl -f http://host.docker.internal:8080/'
            }
        }
    }
}