<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Contact extends Component
{
    public $show_contacts =1;
    public $show_create_form =0;
    public $show_update_form =0;
    public $name;
    public $email;
    public $address;
    public $password;
    public $phone;
    public $message;
    public $contacts;
    public $user_id;

    public function render()
    {
        $this->contacts = User::all();
        return view('livewire.contact');
    }
    public function save()
    {
        $validated = $this->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'password'=>'required',
        ]);

        User::create($validated);
 
        $this->message = "Contact added successfully";
        $this->resetFields();
    }
    public function updateContact($id)
    {
        $validated = $this->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'password'=>'required',
        ]);
        $contact = User::find($id);
        $contact->update($validated);
        $this->message = "Contact updated successfully";
        $this->resetFields();
    }
    public function resetFields()
    {
        $this->name= '';
        $this->email= '';
        $this->address= '';
        $this->password= '';
        $this->phone= '';
    }

    public function showContactForm()
    {
        $this->message = "";
        $this->show_contacts =0;
        $this->show_update_form =0;
        $this->show_create_form =1;
    }
    public function showContacts()
    {
        $this->message = "";
        $this->show_create_form =0;
        $this->show_update_form =0;
        $this->show_contacts =1;
    }
    public function showEditForm($id)
    {
        $this->message = "";
        $contact = User::find($id);
        $this->name=  $contact->name;
        $this->email=  $contact->email;
        $this->address=  $contact->address;
        $this->password=  $contact->password;
        $this->phone=  $contact->phone;
        $this->user_id=  $contact->id;
        $this->show_create_form =0;
        $this->show_contacts =0;
        $this->show_update_form =1;
    }

    public function destroy($id)
    {
        $contact = User::find($id);
        $contact->delete();
        $this->message = "Contact deleted successfully";
    }
}
