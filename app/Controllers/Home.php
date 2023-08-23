<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $email = \Config\Services::email();

        $email->setFrom('mailer.codeigngter@gmail.com', 'Juarez');
        $email->setTo('acrp1@aluno.ifnmg.edu.br');

        $dadosView = [
            'destinatario' => 'Ana clara',
            'remetente' => 'Juarez Ribeiro'
        ];

        $message = view('EmailView', $dadosView); // Aqui definimos o conteúdo da mensagem

        $email->setSubject('Parabéns');
        $email->setMessage($message); // Usamos a variável $message como conteúdo da mensagem

        $email->send();
        return $email->printDebugger();
    }
     public function database()
     {
         return  view ('DataBaseView');
     }

     public function mysql()
     {
         return  view ('Mysql');
     }
}

