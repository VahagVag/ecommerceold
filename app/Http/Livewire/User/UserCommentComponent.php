<?php

namespace App\Http\Livewire\User;

use App\Models\Comments;
use Livewire\Component;
use App\Models\OrderItem;

class UserCommentComponent extends Component
{

    public $order_item_id;
    public $comment;


    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'comment' => 'required'
        ]);
    }

    public function addComment()
    {
        $this->validate([
            'comment' => 'required'
        ]);
        $comment = new Comments();
        $comment->comment = $this->comment;
        $comment->order_item_id = $this->order_item_id;
        $comment->save();

        $orderItem = OrderItem::find($this->order_item_id);
        $orderItem->save();
        session()->flash('message','Your comment has benn sanded');
    }



    public function render()
    {
        $orderItem = OrderItem::where('product_id',$this->order_item_id )->first();
        return view('livewire.user.user-comment-component',['orderItem'=>$orderItem])->layout('layouts.base');
    }
}
