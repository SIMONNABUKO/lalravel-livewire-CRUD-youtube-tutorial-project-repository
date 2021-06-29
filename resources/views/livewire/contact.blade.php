<div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Laravel Livewire CRUD</h1>
        </div>
        <div class="col-md-8 offset-md-2">
            <a href="#" class="btn btn-success" wire:click.prevent="showContactForm()">Add Contact</a>
            <a href="#" class="btn btn-primary" wire:click.prevent="showContacts()">Contacts</a>
        </div>

        @if($show_contacts)
        <div class="col-md-8 offset-md-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if($contacts && $contacts->count() > 0)
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{$contact->address}}</td>
                        <td>
                            <a href="#" class="btn btn-primary"
                                wire:click.prevent="showEditForm({{$contact->id}})">Edit</a>
                            <a href="#" class="btn btn-danger" wire:click.prevent="destroy({{$contact->id}})">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <p>No Contacts found in the database</p>
                    @endif
                </tbody>
            </table>
        </div>

        @endif

        @if($show_create_form)
        <div class="col-md-8 offset-md-2">
            <h4>Create contacts form</h4>

            <p class="text-success">{{$message}}</p>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class=" wire: form-control" wire:model="name">
                    @error('name') <span class="error text-danger">{{$message}}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" wire:model="email" class="form-control">
                    @error('email') <span class="error text-danger">{{$message}}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" wire:model="phone" class=" form-control">
                    @error('phone') <span class="error text-danger">{{$message}}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" wire:model="address" class=" form-control">
                    @error('address') <span class="error text-danger">{{$message}}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" wire:model="password" class="form-control">
                    @error('password') <span class="error text-danger">{{$message}}</span> @enderror
                </div>

                <button type="submit" class="btn btn-primary" wire:click.prevent="save()">Save</button>
            </form>
        </div>
        @endif

        @if($show_update_form)
        <div class="col-md-8 offset-md-2">
            <h4>Update contacts form</h4>
            <p class="text-success">{{$message}}</p>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" wire:model="name" class=" form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email " wire:model="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" wire:model="phone" class=" form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" wire:model="address" class=" form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" wire:model="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary"
                    wire:click.prevent="updateContact({{$user_id}})">Update</button>
            </form>
        </div>

        @endif

    </div>

</div>