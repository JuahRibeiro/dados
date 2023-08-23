<?php

namespace App\Controllers;


class Home extends BaseController
{
    
    public function database(){
        return  view ('DataBaseView');
    }

    public function mysql(){
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM clientes');
        $result = $query->getResult();
        $data['result'] = $result;
        return view ('Mysql', $data);
    }

    public function salvarDados(){

        $db = \Config\Database::connect();
        $nome = $this->request->getPost('nome');
        $email = $this->request->getPost('email');
        $dataNascimento = $this->request->getPost('data_nascimento');

        $emailExiste = $db->table('clientes')->where('email', $email)->countAllResults() > 0;

        if ($emailExiste) {
            $msg['msg'] = "Já existe cliente cadastrado com esse email!";

            return view ('DataBaseView', $msg);
        }

        $data = [
            'nome' => $nome,
            'email' => $email,
            'data_nascimento' => $dataNascimento,
        ];

        $db->table('clientes')->insert($data);

        $msg['msg'] = "Cliente inserido com sucesso!";

        return view ('DataBaseView', $msg);
    }

    

     public function enviarParabens(){
        $db = \Config\Database::connect();
        $hoje = date('Y-m-d');
        $proximaSemana = date('Y-m-d', strtotime('+7 days'));

        $clientesAniversariantes = $db->query("
            SELECT * FROM clientes
            WHERE DATE_FORMAT(data_nascimento, '%m-%d') 
            BETWEEN DATE_FORMAT('$hoje', '%m-%d') AND DATE_FORMAT('$proximaSemana', '%m-%d')
        ")->getResult();

        if (empty($clientesAniversariantes)) {
            // Se não há aniversariantes, envie uma mensagem informando
            $msg['msg'] = "Não há aniversariantes na próxima semana!";

            return view ('Mysql', $msg);
        } else {
            $emailsParaParabens = [];

            $email = \Config\Services::email();
    
            foreach ($clientesAniversariantes as $cliente) {
                $nome = $cliente->nome;
                $dataNascimento = date('d/m', strtotime($cliente->data_nascimento));
                $emailCliente = $cliente->email;

                $emailsParaParabens[] = $emailCliente;
            
                // Configurar o email
                $email->setFrom('juarezribeiro@gmail.com', 'Juarez');
                $email->setTo($emailCliente);
                $email->setSubject('Feliz Aniversário!');
                
                // Conteúdo da mensagem de parabéns com o nome e data de nascimento do cliente
                $mensagem = "Olá $nome,\n\nFeliz Aniversário! Desejamos a você um dia maravilhoso e cheio de alegria. Parabéns pelo seu aniversário em $dataNascimento!";
                $email->setMessage($mensagem);
                
                // Enviar o email
                $email->send();

                $query = $db->query('SELECT * FROM clientes');
                $result = $query->getResult();
                $data['result'] = $result;
                return view('Mysql', [
                    'result' => $result,
                    'emailsParaParabens' => $emailsParaParabens,
                    'data' => $data
                ]);
            }
        }
     }
}

