<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 * @method \App\Model\Entity\Bookmark[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookmarksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $bookmarks = $this->paginate($this->Bookmarks);

        $this->set(compact('bookmarks'));
    }

    /**
     * View method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Users', 'Tags'],
        ]);

        $this->set(compact('bookmark'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    $bookmark = $this->Bookmarks->newEmptyEntity();
    if ($this->request->is('post')) 
    {
        $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
        // Verificar si se ha subido un archivo de imagen
        $image = $this->request->getData('image');
        if (!empty($image)) 
        {
            // Generar un nombre único para el archivo
            $imageName = uniqid() . '_' . $image->getClientFilename();

            // Mover la imagen al directorio deseado
            $image->moveTo(WWW_ROOT . 'img' . DS . $imageName);

            // Asignar la ruta del archivo al campo de imagen en la entidad
            $bookmark->imagen = 'img/' . $imageName;
        }

        // Guardar la entidad
        if ($this->Bookmarks->save($bookmark)) {
            $this->Flash->success(__('The bookmark has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
    }
    $users = $this->Bookmarks->Users->find('list', ['limit' => 200])->all();
    $tags = $this->Bookmarks->Tags->find('list', ['limit' => 200])->all();
    $this->set(compact('bookmark', 'users', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
{
    $bookmark = $this->Bookmarks->get($id, [
        'contain' => ['Tags'],
    ]);
    
    if ($this->request->is(['patch', 'post', 'put'])) {
        $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
        
        // Verificar si se ha subido una nueva imagen
        $newImage = $this->request->getData('new_image');
        if (!empty($newImage)) {
            // Eliminar la imagen anterior si existe
            $oldImage = $bookmark->imagen;
            if (!empty($oldImage)) {
                // Suponiendo que 'imagen' es la ruta de la imagen en el sistema de archivos
                unlink(WWW_ROOT . $oldImage);
            }
            
            // Generar un nombre único para el archivo
            $imageName = uniqid() . '_' . $newImage->getClientFilename();

            // Mover la nueva imagen al directorio deseado
            $newImage->moveTo(WWW_ROOT . 'img' . DS . $imageName);

            // Asignar la ruta del nuevo archivo al campo de imagen en la entidad
            $bookmark->imagen = 'img' . DS . $imageName;
        }

        // Guardar la entidad
        if ($this->Bookmarks->save($bookmark)) {
            $this->Flash->success(__('The bookmark has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
    }

    $users = $this->Bookmarks->Users->find('list', ['limit' => 200])->all();
    $tags = $this->Bookmarks->Tags->find('list', ['limit' => 200])->all();
    $this->set(compact('bookmark', 'users', 'tags'));
}

    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmark = $this->Bookmarks->get($id);
        if ($this->Bookmarks->delete($bookmark)) {
            $this->Flash->success(__('The bookmark has been deleted.'));
        } else {
            $this->Flash->error(__('The bookmark could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
