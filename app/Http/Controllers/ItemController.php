<?php

namespace App\Http\Controllers;

use App\Events\UserLogEntryEvent;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::all();
        return view('items.dashboard', compact('items'));
    }


    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string',
            'description'   => 'required|string',
            'price'         => 'required|numeric',
            'quantity'      => 'required|numeric',
        ]);

        Item::create($request->all());
        $user_id = auth()->user()->id;
        $log_entry = 'User added the item "' . $request->name;
        event(new UserLogEntryEvent($user_id, $log_entry));

        return redirect('/dashboard');
    }

    public function show(Item $item)
    {
        //
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item')); 
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            
            'name'          => 'required|string',
            'description'   => 'required|string',
            'price'         => 'required|numeric',
            'quantity'      => 'required|numeric',
        ]);       

        $item->update($request->all());

        $user_id = auth()->user()->id;
        $log_entry = 'User updated the item "' . $request->name;
        event(new UserLogEntryEvent($user_id, $log_entry));    
            
        return redirect('/dashboard'); 
    }


    public function destroy(Item $item, Request $request) {  
        $item->delete();

        $user_id = auth()->user()->id;
        $log_entry = 'User deleted the item "' . $request->name;
        event(new UserLogEntryEvent($user_id, $log_entry));   

        return redirect("/dashboard");
    }

    public function delete(Item $item) {
        return view('items.delete', compact('item'));   
    }
}
