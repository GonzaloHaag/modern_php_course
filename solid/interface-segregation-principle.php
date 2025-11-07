<?php 

# Principio de segregacion de las interfaces 

/** Indica que las clases que implementan interfaces, no deberian 
 * depender de interfaces que NO utilizan 
 * Se centra en las interfaces
 */

interface CrudBaseInterface {
    public function add();
    public function get();
}

/** Puede ser que no todos los crud usen los 
 * metodos update y delete
 */

interface UpdateCrudInterface {
    public function update();
}

interface DeleteCrudInterface {
    public function delete();
}

/** User necesita update y delete, entonces implementa de todos. Debe cumplior con las 3 interfaces */
class UserCrud implements CrudBaseInterface, UpdateCrudInterface, DeleteCrudInterface {
    # Requiere los metodos add, get, update y delete 
    public function add()
    {
        echo "SE AGREGA";
    }

    public function get()
    {
        echo "SE OBTIENE";
    }

    public function update()
    {
        echo "SE ACTUALIZA";
    }

    public function delete()
    {
        echo "SE BORRA";
    }
}

/** que pasa si una clase NO necesita algun metodo?
 * Solamente la implementamos del crud base
 */

class SaleCrud implements CrudBaseInterface {
      public function add()
    {
        echo "SE AGREGA";
    }

    public function get()
    {
        echo "SE OBTIENE";
    }
}

function update(UpdateCrudInterface $crud) {
    $crud->update;
}
