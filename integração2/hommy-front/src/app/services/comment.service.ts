import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class CommentService {
  apiURL: string = 'http://localhost:8000/api/'

  constructor(public http: HttpClient) { }

  createComment(form):Observable<any> {
    return this.http.post(this.apiURL + 'createComment', form);
  }

  listComments(republic_id):Observable<any> {
    return this.http.get(this.apiURL + 'showRepublicWithComments/' + republic_id);
  }

  updateComment(comment_id, form):Observable<any> {
    return this.http.put(this.apiURL + 'updateComment/' + comment_id, form);
  }

  deleteComment(comment_id):Observable<any> {
    return this.http.delete(this.apiURL + 'deleteComment/' + comment_id);
  }
}
