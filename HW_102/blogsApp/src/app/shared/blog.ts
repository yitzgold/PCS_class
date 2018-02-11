import { Post } from './post';

export interface Blog {
    name: string;
    posts?: Post[];
}