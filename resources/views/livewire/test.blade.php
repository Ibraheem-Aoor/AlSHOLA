<div>
    {{$title}}
   <form >
       <input type="text" wire:model.lazy="input">
       <input type="submit" wire:click="save">Submit
   </form>
</div>
