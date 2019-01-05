@auth
    <div id="myCommentSection" class="comment-center p-t-10" style="width: 800px;">
        @foreach($userComments as $comment)
            <div id="{{'comment'.$comment->id}}" class="comment-body">
                <div class="user-img"> 
                    @if (!is_null($comment -> avatar_path))
                        <img src="{{ asset('users/'.$comment->user_id.'/'.$comment->avatar_path) }}" alt="user-img" width="36" class="img-circle">
                    @else
                        <img src="{{ asset('plugins/images/users/profile.png') }}" alt="user-img" width="36" class="img-circle">
                    @endif
                </div>
                <div class="mail-contnet">
                    <h5>{{$comment -> email}}</h5>
               
                <textarea id="{{'commentContent'.$comment->id}}" style="height: 100px; width:400px; background-color:#FFF; border:none; resize:none;"  name="commentContent" disabled>{{$comment -> comment}}</textarea>

                </div>

                <a onclick="editComment(this)" id="{{"editCommentButton".$comment -> id}}" class="btn btn-warning waves-effect waves-light btn-outline"><span class="btn-label"><i class="fa fa-wrench m-l-5"></i></span> Editar</a>
                <a onclick="updateComment(this)" style="display:none;" id="{{"updateCommentButton".$comment -> id}}" class="btn btn-success waves-effect waves-light btn-outline" ><span class="btn-label"><i class="fa fa-wrench m-l-5"></i></span> Actualizar</a>
                <a onclick="removeComment(this)" id="{{"removeCommentButton".$comment -> id}}" class="btn btn-danger waves-effect waves-light btn-outline"><span class="btn-label"><i class="fa fa-exclamation-triangle m-l-5"></i></span> Eliminar</a>
            </div>
        @endforeach
    </div>
@endauth

<div id="commentSection" class="comment-center p-t-10" style="width: 800px;">

    @foreach($generalComments as $comment)
        <div id="{{'comment'.$comment->id}}" class="comment-body">
            <div class="user-img"> 
                @if (!is_null($comment -> avatar_path))
                    <img src="{{ asset('users/'.$comment->user_id.'/'.$comment->avatar_path) }}" alt="user-img" width="36" class="img-circle">
                @else
                    <img src="{{ asset('plugins/images/users/profile.png') }}" alt="user-img" width="36" class="img-circle">
                @endif
            </div>
            <div class="mail-contnet">
                <h5>{{$comment -> email}}</h5>
        
                <span class="mail-desc">{{$comment -> comment}}</span>
            
                
            </div>
        </div>
    @endforeach
   

    <div id="noCommentsMessageMain">
        @if($generalComments -> isEmpty() && (is_null($userComments) || $userComments -> isEmpty()))
            <div id="noCommentsMesaggeDelete" class="comment-body">
                    <div class="mail-contnet">
                            <h5>Esta publicación no tiene comentarios.</h5>
                            
                    </div>
            </div>
        @endif
    </div>

</div>