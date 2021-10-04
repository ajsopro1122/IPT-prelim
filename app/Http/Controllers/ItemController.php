<?php

namespace App\Http\Controllers;

use App\Events\UserLogEntryEvent;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {

        $items = Item::all();

        return view('items.dashboard', compact('items'));
    }

    public function create() {
        return view('items.create');
    }

    public function store(Request $request) {

        $request->validate([
            'name'          => 'required|string',
            'description'   => 'required|string',
            'price'         => 'required|numeric',
            'quantity'      => 'required|numeric',
        ]);
        $item = Item::create($request->all());
        event(new UserLogEntryEvent("Created an item with ID#$item->id"));
        return redirect('/dashboard');
    }

    public function edit(Item $item) {
        return view('items.edit', compact('item'));   
    }

    public function update(Item $item, Request $request) {
        $request->validate([
            
            'name'          => 'required|string',
            'description'   => 'required|string',
            'price'         => 'required|numeric',
            'quantity'      => 'required|numeric',
        ]);       
        $item->update($request->all());
        event(new UserLogEntryEvent("Updated an item with ID#$item->id"));
        return redirect('/dashboard');        
    }

    public function delete(Item $item) {
        return view('items.delete', compact('item'));   
    }

    public function destroy(Item $item, Request $request) {  
        $item->delete();
        event(new UserLogEntryEvent("Deleted an item with ID#$item->id"));
        return redirect("/dashboard");
    }
}
