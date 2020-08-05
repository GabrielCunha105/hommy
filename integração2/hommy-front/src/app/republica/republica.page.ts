import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { CommentService } from '../services/comment.service';
import { decimalDigest } from '@angular/compiler/src/i18n/digest';

@Component({
  selector: 'app-republica',
  templateUrl: './republica.page.html',
  styleUrls: ['./republica.page.scss'],
})
export class RepublicaPage implements OnInit {

  commentForm: FormGroup;
  editCommentForm: FormGroup;
  editMode = false;

  username = localStorage.getItem('username');
  republic_id:number = JSON.parse(localStorage.getItem('republica')).id;

  comments = [];
  comment_id: number = 0;
  commentBuffer: string = '';
  republic;

  constructor( 
    public formbuilder: FormBuilder,
    public commentService: CommentService) {

    this.commentForm = this.formbuilder.group({
      text: [null, [Validators.required, Validators.maxLength(140)]],
    });
    this.editCommentForm = this.formbuilder.group({
      text: [null, [Validators.required, Validators.maxLength(140)]],
    });
  }

  ngOnInit() {
    this.comments = [/* {
      id: 1,
      username: 'Kujo Jotaro',
      text: 'Oraoraoraoraoraoraororaoraoraoraoroaroarraoao!'
    },
    {
      id: 2,
      username: 'Josuke Higashikata',
      text: 'Dorarararararararararararara!'
    },
    {
      id: 3,
      username: 'Joseph Joestar',
      text: 'Oh my god!!!'
    },
    {
      id: 4,
      username: 'Giorno Giovanna',
      text: 'Mudamudamudamudamudamudamuda!'
    } */];
    this.listComments(this.republic_id);
  }

  sendComment(form){
    console.log(form);
    console.log(form.value);
    form.value.republic_id = this.republic_id;
    form.value.username = this.username;
    this.editMode = false;
    this.commentService.createComment(form.value).subscribe(
      (res) => {console.log(res);},
      (err) => {console.log(err);}
    )
  }

  sendEditComment(form){
    console.log(form);
    console.log(form.value);
    this.editMode = false;
    this.commentService.updateComment(this.comment_id, form.value).subscribe(
      (res) => {
        console.log(res);
        this.commentBuffer = '';
        this.editCommentForm.reset();
        this.listComments(this.republic_id);
      },(err) => {
        console.log(err);
      } 
    );
  }

  toggleEdit(id){
    this.comment_id = id;
    for( let comment of this.comments ){  
      if (comment.id == id){
        this.commentBuffer = comment.text;
      }
    }
    this.editMode = true;
  }

  deleteComment(id){
    this.commentService.deleteComment(id).subscribe(
      (res)=>{
        console.log(res);
        this.listComments(this.republic_id);
      },(err) =>{
        console.log(err);
      }
    );    
  }

  
  listComments(id){
    this.commentService.listComments(id).subscribe(
      (res)=>{
        this.comments = res.comments;
        console.log(this.comments); 
      },
      (err)=>{
        console.log(err);
      }
    );
  }

}
