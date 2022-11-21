<?php


class UserRepository
{
    public function create($add)
    {   
        $file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/TZ2/data/repository.json');
        $users = [];
        if ($file !== '') {
            $users = (array) json_decode($file);
        }

        $users[] = $add;
        return file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/TZ2/data/repository.json',json_encode($users, JSON_FORCE_OBJECT));
    }

    public function get($id)
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/TZ2/data/repository.json')){
            $usersJson = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/TZ2/data/repository.json');
            $usersJsonArray = (array) json_decode($usersJson, true);
            if (!isset($usersJsonArray[$id])) {
                return null;
            }
            return json_encode($usersJsonArray[$id]);
        }
    }

    // public function delete($delete)
    // {
    //     if ($delete){
    //         unset($delete);  // удаляет полностью, поэтому и ошибка на 31
    //         file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/TZ/data/repository.json', json_encode($delete, JSON_FORCE_OBJECT)); //- это для ключа
    //     }    
    // }

    public function update($id, $name, $login)
    {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/TZ2/data/repository.json')) {
            if ($this->get($id) === null ) {
                return null;                
            }
        }
    }
}




$user = new UserRepository();
$user->create($_POST);




/*

class DataConnection 
{
    public $todoName = htmlspecialchars($_POST['todo']);
    public $todoName = trim($todoName);
    public $jsonArray = [];
 
    //Если файл существует - получаем его содержимое
    public function getUser()
    {
        if (file_exists('todo.json')){
            $json = file_get_contents('todo.json');
            $jsonArray = json_decode($json, true);

        }
    }

    // Делаем запись в файл
    public function addUser()
    {
        if ($todoName){
            $jsonArray[] = $todoName;
            file_put_contents('todo.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
            header('Location: '. $_SERVER['HTTP_REFERER']);
        } 
    }


    // Удаление записи
    public function deleteUser()
    {
        $key = @$_POST['todo_name'];
        if (isset($_POST['del'])){
            unset($jsonArray[$key]);
            file_put_contents('todo.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
            header('Location: '. $_SERVER['HTTP_REFERER']);
        } 
    }

    // Редактирование
    public function userUpdate()
    {
        if (isset($_POST['save'])){
            $jsonArray[$key] = @$_POST['title'];
            file_put_contents('todo.json', json_encode($jsonArray, JSON_FORCE_OBJECT));
            header('Location: '. $_SERVER['HTTP_REFERER']);
        } 
    }
}
 
*/

 
